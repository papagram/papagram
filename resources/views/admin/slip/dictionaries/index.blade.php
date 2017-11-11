@extends('adminlte::page')

@section('content_header')
    <div style="margin-bottom: 50px">
        <h1 class="pull-left">@lang('dictionary.model_name')</h1>
        <h1 class="pull-right">
            {!! link_to(route('admin.slip.dictionaries.create'), '新規登録', ['class' => 'btn btn-primary pull-right']) !!}
        </h1>
    </div>
@stop

@section('content')
    @foreach($dictionaries as $dictionary)
        <div class="box box-primary">
            <div class="box-header with-border">
                {!! link_to(
                    route('admin.slip.dictionaries.edit', $dictionary->id),
                    '編集',
                    ['class' => 'btn btn-xs btn-danger pull-right']
                ) !!}
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td colspan="5">
                                <b>{{ $dictionary->title }}</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    {!! nl2br(e($dictionary->payee)) !!}
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    {{ $dictionary->item }}
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    {!! nl2br(e($dictionary->summary)) !!}
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    {{ $dictionary->format_amount }}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <div class="form-group">
                                    {!! nl2br(e($dictionary->note)) !!}
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
@stop
