@extends('adminlte::page')

@section('content_header')
    <div style="margin-bottom: 50px">
        <h1 class="pull-left">@lang('card.model_name')</h1>
        <h1 class="pull-right">
            {!! link_to(route('admin.slip.cards.create'), '伝票入力', ['class' => 'btn btn-primary pull-right']) !!}
        </h1>
    </div>
@stop

@section('content')
    <div class="box">
        <div class="box-body no-padding">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>#</th>
                        <th>@lang('card.receipt_date')</th>
                        <th>@lang('card.receipts_count')</th>
                    </tr>
                    @foreach($cards as $card)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $card->receipt_date->format('Y/m/d') }}</td>
                            <td>{{ $card->receipts_count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
