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
