@extends('adminlte::page')

@push('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">
@endpush

@section('content_header')
    <h1>出金伝票入力</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::model($card, ['route' => ['admin.slip.cards.store']]) !!}

                <div class="form-group">
                    {!! Form::text(
                        'receipt_date',
                        $card->receipt_date,
                        [
                            'class' => 'form-control datepicker',
                            'placeholder' => '日付を選択',
                            'data-mindate' => 'today',
                        ]
                    ) !!}
                </div>

                @for ($i = 0; $i < 5; $i++)
                    @php
                        $no = $i;
                    @endphp
                    @include('admin.slip.cards.fields')
                @endfor

                <div class="form-group col-sm-12">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
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
    </script>
@endpush