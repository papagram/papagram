<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        {{--<link href="https://fonts.googleapis.com/earlyaccess/notosansjp.css" rel="stylesheet">--}}
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
        <style>
            @font-face {
                font-family: ipag;
                font-style: normal;
                font-weight: normal;
                src: url('{{ storage_path('fonts/ipag.ttf') }}') format('truetype');
            }

            @font-face {
                font-family: ipag;
                font-style: bold;
                font-weight: bold;
                src: url('{{ storage_path('fonts/ipag.ttf') }}') format('truetype');
            }

            body {
                font-family: ipag !important;
            }

            .page-break {
                page-break-after: always;
            }

            #pdf .receipt-date {
                font-size: 40px;
                width: 700px;
                text-align: right;
            }

            #pdf .attention{
                width: 600px;
                margin-left: auto;
                margin-right: auto;
                margin-bottom: 10px;
                font-size: 8px;
            }

            #pdf .table-header {
                table-layout: fixed;
                width: 600px;
                font-size: 12px;
                margin-left: auto;
                margin-right: auto;
                margin-bottom: 5px;
                border-collapse: collapse;
            }

            #pdf .table-header td {
                margin: 0px;
                font-size: 14px;
                font-weight: bold;
            }

            #pdf .table {
                table-layout: fixed;
                width: 600px;
                font-size: 12px;
                margin-left: auto;
                margin-right: auto;
                margin-bottom: 5px;
                border-collapse: collapse;
            }

            #pdf .table td {
                border: 1px solid #000;
                margin: 0px;
                padding-left: 4px;
                overflow-wrap: break-word;
                word-wrap: break-word;
                white-space: normal;
            }

            #pdf .table .no {
                padding-left: 0px;
            }
        </style>
    </head>
    <body>
        <div id="pdf">
            @foreach($cards as $card)
                <div class="receipt-date">{{ $card->receipt_date->format('m/d')}}</div>

                <div class="attention">
                    <p>
                        ※出金表（領収書等支払い証明の発行がない為）
                    </p>
                </div>

                <table class="table-header">
                    <tbody>
                        <tr>
                            <td style="width: 5%"></td>
                            <td style="width: 30%" align="center">@lang('receipt.payee')</td>
                            <td style="width: 20%" align="center">@lang('receipt.item')</td>
                            <td style="width: 30%" align="center">@lang('receipt.summary')</td>
                            <td style="width: 15%" align="center">@lang('receipt.amount')</td>
                        </tr>
                    </tbody>
                </table>

                @foreach($card->receipts as $receipt)
                    <table class="table">
                        <tbody>
                            <tr>
                                <td rowspan="2" align="center" class="no" style="width: 5%">
                                    {{ $loop->iteration }}
                                </td>
                                <td style="width: 30%">
                                    {!! nl2br(e($receipt->payee)) !!}
                                </td>
                                <td style="width: 20%">
                                    {{ $receipt->item }}
                                </td>
                                <td style="width: 30%">
                                    {!! nl2br(e($receipt->summary)) !!}
                                </td>
                                <td style="width: 15%">
                                    {{ $receipt->format_amount }}
                                </td>
                            </tr>
                            @if(!empty($receipt->note))
                                <tr>
                                    <td colspan="4">
                                        {!! nl2br(e($receipt->note)) !!}
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                @endforeach

                @if(!$loop->last)
                    <div class="page-break"></div>
                @endif
            @endforeach
        </div>
    </body>
</html>
