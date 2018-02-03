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
