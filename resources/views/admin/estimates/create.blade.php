@extends('adminlte::page')

@push('css')
    <link rel="stylesheet"
          href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">
@endpush

@section('content_header')
    <h1>@lang('estimate.model_name')</h1>
@stop

@section('content')
    {!! Form::model($estimate, ['route' => ['admin.estimates.store'], 'class' => 'form-horizontal h-adr']) !!}
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">見積情報</h3>
            </div>
            <div class="box-body">
                @include('admin.estimates.info_fields')
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">見積項目</h3>
            </div>
            <div class="box-body">
                @include('admin.estimates.item_fields')
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-footer">
                {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    {!! Form::close() !!}
@stop

@push('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.ja.min.js"></script>
    <script src="{{ asset('/js/datepicker.js') }}"></script>
    <script src="{{ asset('/js/disable_enter_key.js') }}"></script>
@endpush
