@extends('adminlte::page')

@section('content_header')
    <div style="margin-bottom: 50px">
        {{-- <h1 class="pull-left">@lang('client.model_name')</h1> --}}
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
        <div class="box-header">
            <h3 class="box-title">見積書一覧</h3>
        </div>
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>@lang('estimate.issue_date')</th>
                        <th>@lang('estimate.expiration_date')</th>
                        <th>@lang('estimate.client_name')</th>
                        <th>@lang('estimate.subject')</th>
                        <th>@lang('estimate.amount_total')</th>
                        <th>操作</th>
                    </tr>
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
