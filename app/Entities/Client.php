<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Client.
 *
 * @package namespace App\Entities;
 */
class Client extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'name', 'tel1', 'tel2', 'tel3', 'postcode1', 'postcode2',
        'address', 'email', 'url',
    ];

    public function concatTel()
    {
        return $this->tel1 . '-' . $this->tel2 . '-' . $this->tel3;
    }

    public function concatPostcode()
    {
        return $this->postcode1 . '-' . $this->postcode2;
    }

}
