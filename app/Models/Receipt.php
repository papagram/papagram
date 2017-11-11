<?php

namespace App\Models;

use App\Models\Card;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable = [
        'amount',
        'item',
        'note',
        'payee',
        'summary',
        'card_id',
    ];

    protected $casts = [
        'amount' => 'integer',
        'item' => 'string',
        'note' => 'string',
        'payee' => 'string',
        'summary' => 'string',
        'card_id' => 'integer',
    ];

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
