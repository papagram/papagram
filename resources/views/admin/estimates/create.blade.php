@extends('adminlte::page')

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
            <div class="box-footer">
                {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    {!! Form::close() !!}
@stop
