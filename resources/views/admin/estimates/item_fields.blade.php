{!! Form::hidden('item_count', $item_count) !!}
<table class="table table-bordered">
    <tbody>
        <tr>
            <th>@lang('item.name')</th>
            <th>@lang('item.number')</th>
            <th>@lang('item.unit_price')</th>
            <th>@lang('item.subtotal')</th>
            <th>操作</th>
        </tr>
        @for($i = 0; $i < $item_count; $i++)
            <tr>
                <td>
                    {!! Form::text(
                        "items[$i][name]",
                        null,
                        [
                            'class' => 'form-control'
                        ]
                    ) !!}
                </td>
                <td>
                    {!! Form::number(
                        "items[$i][number]",
                        null,
                        [
                            'class' => 'form-control'
                        ]
                    ) !!}
                </td>
                <td>
                    {!! Form::number(
                        "items[$i][unit_price]",
                        null,
                        [
                            'class' => 'form-control'
                        ]
                    ) !!}
                </td>
                <td>
                    {!! Form::text(
                        "items[$i][subtotal]",
                        null,
                        [
                            'class' => 'form-control',
                            'disabled' => true
                        ]
                    ) !!}
                </td>
                <td></td>
            </tr>
        @endfor
    </tbody>
</table>
