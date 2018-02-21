@extends('adminlte::page')

@section('content_header')
    <div class="inner-wrapper">
        <h1 class="pull-right">
            {!! link_to(
                route('admin.clients.create'),
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
            <h3 class="box-title">@lang('client.model_name')一覧</h3>
        </div>
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover" id="clientsTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('client.code')</th>
                        <th>@lang('client.name')</th>
                        <th>@lang('client.tel')</th>
                        <th>@lang('client.postcode')</th>
                        <th>@lang('client.address')</th>
                        <th>@lang('client.email')</th>
                        <th>@lang('client.url')</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $client->code }}</td>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->tel }}</td>
                            <td>{{ $client->postcode }}</td>
                            <td>{{ $client->address }}</td>
                            <td>{{ \Html::mailto($client->email) }}</td>
                            <td>
                                {!! link_to(
                                    $client->url,
                                    $client->url,
                                    [
                                        'target' => '_blank'
                                    ]
                                ) !!}
                            </td>
                            <td>
                                {!! link_to(
                                    route('admin.clients.show', $client->id),
                                    '詳細',
                                    ['class' => 'btn btn-xs btn-success']
                                ) !!}
                                {!! link_to(
                                    route('admin.clients.edit', $client->id),
                                    '編集',
                                    ['class' => 'btn btn-xs btn-warning']
                                ) !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
