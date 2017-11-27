<table class="table table-bordered">
    <tbody>
        <tr>
            <td>
                {{ ++$no }}
            </td>
            <td>
                <div class="form-group">
                    {!! Form::textarea(
                        "receipts[$i][payee]",
                        null,
                        [
                            'class' => 'form-control payee',
                            'placeholder' => __('receipt.payee'),
                            'rows' => 1,
                        ]
                    ) !!}
                </div>
            </td>
            <td>
                <div class="form-group">
                    {!! Form::text(
                        "receipts[$i][item]",
                        null,
                        [
                            'class' => 'form-control item',
                            'placeholder' => __('receipt.item'),
                        ]
                    ) !!}
                </div>
            </td>
            <td>
                <div class="form-group">
                    {!! Form::textarea(
                        "receipts[$i][summary]",
                        null,
                        [
                            'class' => 'form-control summary',
                            'placeholder' => __('receipt.summary'),
                            'rows' => 1,
                        ]
                    ) !!}
                </div>
            </td>
            <td>
                <div class="form-group">
                    {!! Form::number(
                        "receipts[$i][amount]",
                        null,
                        [
                            'class' => 'form-control amount',
                            'placeholder' => __('receipt.amount'),
                        ]
                    ) !!}
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="dropdown">
                    <a class="btn btn-primary dropdown-toggle" role="button" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        辞書
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @foreach($dictionaries as $dictionary)
                            <li>
                                {!! link_to(route('admin.slip.dictionaries.show', $dictionary->id), $dictionary->title, ['class' => 'dictionary']) !!}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <button class="btn btn-danger clear" style="margin-top: 15px;">クリア</button>
                </div>
            </td>
            <td colspan="4">
                <div class="form-group">
                    {!! Form::textarea(
                        "receipts[$i][note]",
                        null,
                        [
                            'class' => 'form-control note',
                            'placeholder' => __('receipt.note'),
                            'rows' => 3,
                        ]
                    ) !!}
                </div>
            </td>
        </tr>
    </tbody>
</table>
<hr>
