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
