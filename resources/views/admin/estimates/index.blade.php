@extends('adminlte::page')

@section('content_header')
    <div class="inner-wrapper">
        <h1 class="pull-right">
            {!! link_to(
                route('admin.estimates.create'),
                '新規登録',
                [
                    'class' => 'btn btn-primary pull-right'
                ]
            ) !!}
        </h1>
    </div>
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('estimate.model_name')一覧</h3>
        </div>
        <div class="box-body table-responsive no-padding">
            <estimates-table
                :estimates="{{$estimates->toJson()}}"
                api_token="{{ \Auth::user()->api_token }}"
            ></estimates-table>
        </div>
    </div>
@stop
