@extends('adminlte::page')

@section('content_header')
    <h1>取引先</h1>
@stop

@section('content')
    <div class="box box-primary">
        {!! Form::model($client, ['route' => ['admin.clients.store'], 'class' => 'form-horizontal h-adr']) !!}
            <div class="box-body">
                @include('admin.clients.fields')
            </div>
            <div class="box-footer">
                {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@stop
