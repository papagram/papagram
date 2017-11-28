<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    protected $fillable = [
        'amount',
        'item',
        'note',
        'payee',
        'summary',
        'title',
    ];

    protected $casts = [
        'amount' => 'integer',
        'item' => 'string',
        'note' => 'string',
        'payee' => 'string',
        'summary' => 'string',
        'title' => 'string',
    ];

    public function getFormatAmountAttribute()
    {
        return '￥' . number_format(floor($this->amount));
    }
}
