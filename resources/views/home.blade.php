@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>You are logged in!</p>
    <div id="app">
        <example-component></example-component>
    </div>
@stop

@push('js')
    <script src="{{ mix('js/app.js') }}"></script>
@endpush
