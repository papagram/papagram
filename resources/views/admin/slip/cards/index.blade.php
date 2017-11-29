@extends('adminlte::page')

@push('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">
@endpush

@section('content_header')
    <div style="margin-bottom: 50px">
        <h1 class="pull-left">@lang('card.model_name')</h1>
        <h1 class="pull-right">
            {!! link_to(route('admin.slip.cards.create'), '伝票入力', ['class' => 'btn btn-primary pull-right']) !!}
            <button class="btn btn-danger pull-right btn-pdf" style="margin-right: 15px;">PDF</button>
            <button class="btn btn-success pull-right btn-printed" style="margin-right: 15px;">印刷済にする</button>
        </h1>
    </div>
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">期間を選択</h3>
        </div>
        {!! Form::open(['url' => route('admin.slip.cards.index'), 'method' => 'GET']) !!}
            <div class="box-body">
                <div class="form-group col-sm-6">
                    {!! Form::text(
                        'start_date',
                        null,
                        [
                            'class' => 'form-control datepicker',
                            'placeholder' => '日付を選択',
                            'data-mindate' => 'today',
                        ]
                    ) !!}
                </div>
                <div class="clearfix"></div>

                <div class="form-group col-sm-6">
                    {!! Form::text(
                        'end_date',
                        null,
                        [
                            'class' => 'form-control datepicker',
                            'placeholder' => '日付を選択',
                            'data-mindate' => 'today',
                        ]
                    ) !!}
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="box-footer">
                <div class="form-group col-sm-12">
                    {!! Form::submit('検索', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
    <div class="box">
        <div class="box-body no-padding">
            {!! Form::open(['url' => route('admin.slip.cards.pdf'), 'id' => 'pdfForm', 'target' => '_blank']) !!}
                <table class="table table-striped" id="cardsTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('card.receipt_date')</th>
                            <th>@lang('card.receipts_count')</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cards as $card)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $card->receipt_date->format('Y/m/d') }}</td>
                                <td>{{ $card->receipts_count }}</td>
                                <td>
                                    {!! link_to(
                                        route('admin.slip.cards.edit', $card->id),
                                        '編集',
                                        ['class' => 'btn btn-xs btn-success']
                                    ) !!}
                                    {!! link_to(
                                        route('admin.slip.cards.destroy', $card->id),
                                        '削除',
                                        ['class' => 'btn btn-xs btn-danger destroy']
                                    ) !!}
                                </td>
                                {!! Form::hidden('card_ids[]', $card->id) !!}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@push('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.ja.min.js"></script>
    <script>
        $('.btn-pdf').on('click', function(e) {
            e.preventDefault();
            $('#pdfForm').submit();
        });

        $('.btn-printed').on('click', function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '{{ route('admin.slip.cards.printed', [], false) }}',
                data: $('#pdfForm').serializeArray(),
                timeout: 10000
            }).then(function(response) {
                $('#cardsTable').children('tbody').fadeOut(500, function() {
                    $(this).empty();
                });
            }).fail(function(xhr, statusText, errorThrown) {
                alert(statusText + ": エラーが発生しました。");
                console.log(errorThrown);
            }).always(function(response, statusText, obj) {
                console.log('通信が完了しました。');
            });
        });

        $('.datepicker').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd',
          language: 'ja',
          orientation: "bottom"
        });

        $('.destroy').on('click', function(e) {
            e.preventDefault();

            var one = $(this);
            var token = $("meta[name='csrf-token']").attr('content');

            $.ajax({
                type: 'POST',
                url: one.attr('href'),
                data: {
                    _method: 'delete',
                    _token: token
                },
                timeout: 10000
            }).then(function(response) {
                one.parents('tr').fadeOut(500, function() {
                    $(this).remove();
                });
            }).fail(function(xhr, statusText, errorThrown) {
                alert(statusText + ": エラーが発生しました。");
                console.log(errorThrown);
            }).always(function(response, statusText, obj) {
                console.log('通信が完了しました。');
            });
        });
    </script>
@endpush
