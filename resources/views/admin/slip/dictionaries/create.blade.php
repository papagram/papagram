@extends('adminlte::page')

@section('content_header')
    <h1>仕訳辞書登録</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::model($dictionary, ['route' => ['admin.slip.dictionaries.store']]) !!}

                @include('admin.slip.dictionaries.fields')

            {!! Form::close() !!}
        </div>
    </div>
@stop
