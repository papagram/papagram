{!! Form::bsText('code', $client->code, 'client.code') !!}
{!! Form::bsText('name', $client->name, 'client.name') !!}

<div class="form-group">
    {!! Form::label('tel', __('client.tel'), ['class' => 'col-sm-2']) !!}
    <div class="col-sm-10 form-inline">
        {!! Form::text(
            'tel1',
            $client->tel1,
            [
                'class' => 'form-control',
                'size' => 3,
                'maxlength' => 3
            ]
        ) !!}
        <span>-</span>
        {!! Form::text(
            'tel2',
            $client->tel2,
            [
                'class' => 'form-control',
                'size' => 4,
                'maxlength' => 4
            ]
        ) !!}
        <span>-</span>
        {!! Form::text(
            'tel3',
            $client->tel3,
            [
                'class' => 'form-control',
                'size' => 4,
                'maxlength' => 4
            ]
        ) !!}
    </div>
</div>

<div class="form-group">
    <span class="p-country-name" style="display:none;">Japan</span>
    {!! Form::label('postcode', __('client.postcode'), ['class' => 'col-sm-2']) !!}
    <div class="col-sm-10 form-inline">
        {!! Form::text(
            'postcode1',
            $client->postcode1,
            [
                'class' => 'form-control p-postal-code',
                'size' => 3,
                'maxlength' => 3
            ]
        ) !!}
        <span>-</span>
        {!! Form::text(
            'postcode2',
            $client->postcode2,
            [
                'class' => 'form-control p-postal-code',
                'size' => 4,
                'maxlength' => 4
            ]
        ) !!}
    </div>
    {!! link_to(
        'http://www.post.japanpost.jp/zipcode/',
        '郵便番号検索',
        [
            'target' => '_blank',
            'class' => 'col-xs-offset-2 col-xs-10'
        ]
    ) !!}
</div>

{!! Form::bsText(
    'address',
    $client->address,
    'client.address',
    [
        'class' => 'p-region p-locality p-street-address p-extended-address form-control'
    ]
) !!}
{!! Form::bsEmail('email', $client->email, 'client.email') !!}
{!! Form::bsText('url', $client->url, 'client.url') !!}
{!! Form::bsTextarea('note', $client->note, 'client.note') !!}

@push('js')
    <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
@endpush
