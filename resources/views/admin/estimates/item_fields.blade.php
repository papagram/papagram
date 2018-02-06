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
            <th>@lang('item.subtotal')</th>
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
                    type="number"
                    class="form-control"
                >
            </td>
            <td>
                <input
                    v-model="item.unit_price"
                    :name="'items['+ key +'][unit_price]'"
                    type="number"
                    class="form-control"
                >
            </td>
            <td>
                <input
                    v-model="item.subtotal"
                    :name="'items['+ key +'][subtotal]'"
                    type="number"
                    class="form-control"
                    disabled
                >
            </td>
            <td></td>
        </tr>
    </tbody>
</table>
<button v-on:click.prevent="onAdd">追加</button>

@push('js')
    <script src="{{ asset('/js/app.js') }}"></script>
    <script>
        const vm = new Vue({
            el: '#estimateForm',
            data: {
                items: {!! $items->toJson() !!},
                itemCount: {!! $items->count() !!},
            },
            methods: {
                onAdd: function () {
                    this.items.push(
                        {
                            'name': '',
                            'number': '',
                            'unit_price': '',
                            'subtotal': ''
                        }
                    )
                }
            }
        })
    </script>
@endpush
