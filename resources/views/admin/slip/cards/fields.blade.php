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
                            'class' => 'form-control',
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
                            'class' => 'form-control',
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
                            'class' => 'form-control',
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
                            'class' => 'form-control',
                            'placeholder' => __('receipt.amount'),
                        ]
                    ) !!}
                </div>
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="4">
                <div class="form-group">
                    {!! Form::textarea(
                        "receipts[$i][note]",
                        null,
                        [
                            'class' => 'form-control',
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
