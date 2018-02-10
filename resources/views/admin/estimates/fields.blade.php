<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">見積情報</h3>
    </div>
    <div class="box-body">
        {!! Form::bsText(
            'issue_date',
            $estimate->issue_date,
            'estimate.issue_date',
            [
                'class' => 'form-control datepicker',
                'placeholder' => '日付を選択',
                'data-mindate' => 'today',
            ]
        ) !!}

        {!! Form::bsText(
            'client_name',
            $estimate->client_name,
            'estimate.client_name'
        ) !!}

        {!! Form::bsText(
            'subject',
            $estimate->subject,
            'estimate.subject'
        ) !!}

        {!! Form::bsText(
            'expiration_date',
            $estimate->expiration_date,
            'estimate.expiration_date',
            [
                'class' => 'form-control datepicker',
                'placeholder' => '見積有効期限を選択',
                'data-mindate' => 'today',
            ]
        ) !!}

        {!! Form::bsTextarea('note', $estimate->note, 'estimate.note') !!}
    </div>
</div>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">見積項目</h3>
    </div>
    <div class="box-body">
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
    </div>
    <div class="box-footer">
        <button v-on:click.prevent="onAdd()" class="btn btn-success">
            <i class="fa fa-plus"></i>
        </button>
    </div>
</div>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">見積金額</h3>
    </div>
    <div class="box-body">
        {!! Form::bsNumber(
            'subtotal',
            $estimate->subtotal,
            'estimate.subtotal',
            [
                'v-model' => 'subtotal',
            ]
        ) !!}

        {!! Form::bsNumber(
            'consumption_tax',
            null,
            'estimate.consumption_tax',
            [
                'v-model' => 'consumption_tax',
            ]
        ) !!}

        {!! Form::bsNumber(
            'amount_total',
            $estimate->amount_total,
            'estimate.amount_total',
            [
                'v-model' => 'amount_total',
            ]
        ) !!}
    </div>
</div>

<div class="box box-primary">
    <div class="box-footer">
        {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

@push('js')
    <script src="{{ asset('/js/app.js') }}"></script>
    <script>
        const vm = new Vue({
            el: '#estimateForm',
            data: {
                items: {!! $items->toJson() !!},
                itemCount: 1,
                subtotal: {{ $estimate->subtotal ?? 0 }},
                consumption_tax_rate: {{ config('const.consumption_tax_rate') }},
                consumption_tax: 0,
                amount_total: {{ $estimate->amount_total ?? 0 }},
            },
            created: function () {
                this.updateItemCount();
            },
            methods: {
                onAdd: function () {
                    this.items.push(
                        {
                            'name': '',
                            'number': 1,
                            'unit_price': 0,
                            'line_price': 0
                        }
                    );

                    this.updateItemCount();
                },
                onDelete: function (key) {
                    this.items.splice(key, 1);
                    this.updateItemCount();
                    this.calculateSubtotal();
                    this.calculateConsumptionTax();
                    this.calculateAmountTotal();
                },
                onCalculate: function (key) {
                    this.calculateLinePrice(key);
                    this.calculateSubtotal();
                    this.calculateConsumptionTax();
                    this.calculateAmountTotal();
                },
                updateItemCount: function () {
                    this.itemCount = this.items.length;
                },
                calculateLinePrice: function (key) {
                    let item = this.items[key];
                    item.line_price = item.number * item.unit_price;
                },
                calculateSubtotal: function () {
                    let subtotal = 0;
                    for(let k of Object.keys(this.items)) {
                        subtotal += this.items[k].line_price;
                    }

                    this.subtotal = subtotal;
                },
                calculateConsumptionTax: function () {
                    this.consumption_tax =
                        this.subtotal * this.consumption_tax_rate;
                },
                calculateAmountTotal: function () {
                    this.amount_total =
                        this.subtotal + this.consumption_tax;
                },
            }
        });
    </script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.ja.min.js"></script>
    <script src="{{ asset('/js/datepicker.js') }}"></script>
    <script src="{{ asset('/js/disable_enter_key.js') }}"></script>
@endpush
