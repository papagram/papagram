<?php

namespace App\Entities;

use App\Entities\Item;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Estimate.
 *
 * @package namespace App\Entities;
 */
class Estimate extends Model implements Transformable
{
    use TransformableTrait;

    protected $attributes = [
        'subtotal' => 0,
        'amount_total' => 0,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'issue_date', 'client_name', 'subject', 'expiration_date', 'note',
        'subtotal', 'consumption_tax_rate', 'amount_total',
    ];

    public function items()
    {
        return $this->morphMany(Item::class, 'itemable');
    }
}
