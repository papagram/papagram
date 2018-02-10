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
