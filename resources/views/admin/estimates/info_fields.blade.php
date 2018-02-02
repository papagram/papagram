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