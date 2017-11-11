<table class="table table-bordered">
    <tbody>
        <tr>
            <td colspan="5">
                {!! Form::text(
                    'title',
                    $dictionary->title,
                    [
                        'class' => 'form-control',
                        'placeholder' => __('dictionary.title'),
                    ]
                ) !!}
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group">
                    {!! Form::textarea(
                        'payee',
                        $dictionary->payee,
                        [
                            'class' => 'form-control',
                            'placeholder' => __('dictionary.payee'),
                            'rows' => 1,
                        ]
                    ) !!}
                </div>
            </td>
            <td>
                <div class="form-group">
                    {!! Form::text(
                        'item',
                        $dictionary->item,
                        [
                            'class' => 'form-control',
                            'placeholder' => __('dictionary.item'),
                        ]
                    ) !!}
                </div>
            </td>
            <td>
                <div class="form-group">
                    {!! Form::textarea(
                        'summary',
                        $dictionary->summary,
                        [
                            'class' => 'form-control',
                            'placeholder' => __('dictionary.summary'),
                            'rows' => 1,
                        ]
                    ) !!}
                </div>
            </td>
            <td>
                <div class="form-group">
                    {!! Form::number(
                        'amount',
                        $dictionary->amount,
                        [
                            'class' => 'form-control',
                            'placeholder' => __('dictionary.amount'),
                        ]
                    ) !!}
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <div class="form-group">
                    {!! Form::textarea(
                        'note',
                        $dictionary->note,
                        [
                            'class' => 'form-control',
                            'placeholder' => __('dictionary.note'),
                            'rows' => 3,
                        ]
                    ) !!}
                </div>
            </td>
        </tr>
    </tbody>
</table>

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    {!! link_to(
        route('admin.slip.dictionaries.index'),
        'Cancel',
        ['class' => 'btn btn-default']
    ) !!}
</div>
