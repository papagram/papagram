@extends('adminlte::page')

@section('content_header')
    <div style="margin-bottom: 50px">
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
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>@lang('estimate.issue_date')</th>
                        <th>@lang('estimate.expiration_date')</th>
                        <th>@lang('estimate.client_name')</th>
                        <th>@lang('estimate.subject')</th>
                        <th>@lang('estimate.amount_total')</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($estimates as $estimate)
                        <tr>
                            <td>{{ $estimate->issue_date }}</td>
                            <td>{{ $estimate->expiration_date }}</td>
                            <td>{{ $estimate->client_name }}</td>
                            <td>{{ $estimate->subject }}</td>
                            <td>{{ $estimate->amount_total_in_yen }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
