<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The price pruducts that belong to the order
     */
    public function prices()
    {
        return $this->belongsToMany('App\Models\Price')
            ->using('App\Models\OrderPrice')
            ->withPivot([
                'price',
                'title',
                'quantity',
            ]);;
    }
}
