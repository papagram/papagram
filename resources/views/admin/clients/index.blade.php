@extends('adminlte::page')

@section('content_header')
    <div style="margin-bottom: 50px">
        <h1 class="pull-left">@lang('client.model_name')</h1>
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
        <div class="box-body no-padding">
            <table class="table table-striped" id="clientsTable">
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
                            <td>{{ $client->concatTel() }}</td>
                            <td>{{ $client->concatPostcode() }}</td>
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
                                    route('admin.clients.edit', $client->id),
                                    '編集',
                                    ['class' => 'btn btn-xs btn-success']
                                ) !!}
                                {!! link_to(
                                    route('admin.clients.destroy', $client->id),
                                    '削除',
                                    ['class' => 'btn btn-xs btn-danger destroy']
                                ) !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
