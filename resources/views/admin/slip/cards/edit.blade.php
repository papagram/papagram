@extends('adminlte::page')

@push('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">
@endpush

@section('content_header')
    <h1>出金伝票編集</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::model($card, ['route' => ['admin.slip.cards.update', $card->id], 'method' => 'patch', 'id' => 'cardForm']) !!}
                {!! Form::hidden("id", null) !!}
                <div class="form-group {{ $errors->has('receipt_date') ? 'has-error' : '' }}">
                    {!! Form::text(
                        'receipt_date',
                        $card->receipt_date->format('Y-m-d'),
                        [
                            'class' => 'form-control datepicker receipt-date',
                            'placeholder' => '日付を選択',
                            'data-mindate' => 'today',
                        ]
                    ) !!}
                    @if($errors->has('receipt_date'))
                        <p class="help-block">{{ $errors->first('receipt_date') }}</p>
                    @endif
                </div>

                @for ($i = 0; $i < 5; $i++)
                    @php
                        $no = $i;
                    @endphp
                    {!! Form::hidden("receipts[$i][id]", null) !!}
                    @include('admin.slip.cards.fields')
                @endfor

                <div class="form-group col-sm-12">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary save']) !!}
                    {!! link_to(
                        route('admin.slip.cards.index'),
                        'Cancel',
                        ['class' => 'btn btn-default']
                    ) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@push('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.ja.min.js"></script>
    <script>
        $('.datepicker').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd',
          language: 'ja',
          orientation: "bottom"
        });

        $('.dictionary').on('click', function(e) {
            e.preventDefault();

            var one = $(this);

            $.ajax({
                type: 'GET',
                url: one.attr('href'),
                dataType: 'json',
                timeout: 10000
            }).then(function(response) {
                var table = one.parents('table');
                table.find('.payee').val(response.payee);
                table.find('.item').val(response.item);
                table.find('.summary').val(response.summary);
                table.find('.amount').val(response.amount);
                table.find('.note').val(response.note);
            }).fail(function(xhr, statusText, errorThrown) {
                alert(statusText + ": データの取得に失敗しました。");
                console.log(errorThrown);
            }).always(function(response, statusText, obj) {
                console.log('通信が完了しました。');
            });
        });

        $('.clear').on('click', function(e) {
            e.preventDefault();

            var one = $(this);
            var table = one.parents('table');
            table.find('.payee').val("");
            table.find('.item').val("");
            table.find('.summary').val("");
            table.find('.amount').val("");
            table.find('.note').val("");
        });

        // $(function() {
        //     $(document).on("keypress", function(event) {
        //         return event.which !== 13;
        //     });
        // });
    </script>
@endpush
