@extends('adminlte::page')

@section('content_header')
    <h1>@lang('estimate.model_name')</h1>
@stop

@section('content')
    <div id="estimateForm" v-pre>
        {!! Form::model(
            $estimate,
            [
                'route' => [
                    'admin.estimates.update',
                    $estimate->id
                ],
                'method' => 'patch',
                'class' => 'form-horizontal h-adr'
            ]
        ) !!}
            @include('admin.estimates.fields')
        {!! Form::close() !!}
    </div>
@stop
