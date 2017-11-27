@extends('adminlte::page')

@section('content_header')
    <div style="margin-bottom: 50px">
        <h1 class="pull-left">@lang('card.model_name')</h1>
        <h1 class="pull-right">
            {!! link_to(route('admin.slip.cards.create'), '伝票入力', ['class' => 'btn btn-primary pull-right']) !!}
            <button class="btn btn-danger pull-right btn-pdf" style="margin-right: 15px;">PDF</button>
        </h1>
    </div>
@stop

@section('content')
    <div class="box">
        <div class="box-body no-padding">
            {!! Form::open(['url' => route('admin.slip.cards.pdf'), 'id' => 'pdfForm']) !!}
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
                            {!! Form::hidden('card_ids[]', $card->id) !!}
                        @endforeach
                    </tbody>
                </table>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@push('js')
    <script>
        $('.btn-pdf').on('click', function(e) {
            e.preventDefault();
            $('#pdfForm').submit();
        });
    </script>
@endpush
