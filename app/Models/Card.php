<?php

namespace App\Models;

use App\Models\Receipt;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'receipt_date',
        'printed_at',
    ];

    protected $casts = [
        'receipt_date' => 'date',
        'printed_at' => 'datetime',
    ];

    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }

    public function scopeYetPrintedWithReceiptsCount($query)
    {
        return $query->whereNull('printed_at')->withCount('receipts');
    }

    public function isPrinted()
    {
        return !is_null($this->printed_at);
    }
}
