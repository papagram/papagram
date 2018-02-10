@extends('adminlte::page')

@push('css')
    <link rel="stylesheet"
          href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">
@endpush

@section('content_header')
    <h1>@lang('estimate.model_name')</h1>
@stop

@section('content')
    <div id="estimateForm" v-pre>
        {!! Form::model($estimate, ['route' => ['admin.estimates.store'], 'class' => 'form-horizontal h-adr']) !!}
            @include('admin.estimates.fields')
        {!! Form::close() !!}
    </div>
@stop
