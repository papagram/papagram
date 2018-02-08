{!! Form::hidden(
    'item_count',
    $item_count,
    [
        'v-model' => 'itemCount'
    ]
) !!}

<table class="table table-bordered">
    <thead>
        <tr>
            <th>@lang('item.name')</th>
            <th>@lang('item.number')</th>
            <th>@lang('item.unit_price')</th>
            <th>@lang('item.line_price')</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="(item, key) in items">
            <td>
                <input
                    v-model="item.name"
                    :name="'items['+ key +'][name]'"
                    type="text"
                    class="form-control"
                >
            </td>
            <td>
                <input
                    v-model="item.number"
                    :name="'items['+ key +'][number]'"
                    v-on:change="onCalculate(key)"
                    type="number"
                    class="form-control"
                >
            </td>
            <td>
                <input
                    v-model="item.unit_price"
                    :name="'items['+ key +'][unit_price]'"
                    v-on:change="onCalculate(key)"
                    type="number"
                    class="form-control"
                >
            </td>
            <td>
                <input
                    v-model="item.line_price"
                    :name="'items['+ key +'][line_price]'"
                    type="number"
                    class="form-control"
                    disabled
                >
            </td>
            <td>
                <div class="text-center">
                    <button v-on:click.prevent="onDelete(key)" class="btn btn-danger btn-xs">
                        <i class="fa fa-remove"></i>
                    </button>
                </div>
            </td>
        </tr>
    </tbody>
</table>
