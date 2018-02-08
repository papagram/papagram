<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Item.
 *
 * @package namespace App\Entities;
 */
class Item extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'number','unit_price', 'line_price',
        'itemable_id', 'itemable_type'
    ];

    public function itemable()
    {
        return $this->morphTo();
    }
}
