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
            {!! Form::open(['url' => route('admin.slip.cards.pdf'), 'id' => 'pdfForm']) !!}
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>@lang('card.receipt_date')</th>
                            <th>@lang('card.receipts_count')</th>
                        </tr>
                        @foreach($cards as $card)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $card->receipt_date->format('Y/m/d') }}</td>
                                <td>{{ $card->receipts_count }}</td>
                            </tr>
                            {!! Form::hidden('card_ids[]', $card->id) !!}
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

        $('.datepicker').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd',
          language: 'ja',
          orientation: "bottom"
        });
    </script>
@endpush
