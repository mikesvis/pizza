<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['price', 'priceable_type', 'priceable_id'];

    /**
     * Morph relation outer
     *
     * @return void
     */
    public function priceable()
    {
        return $this->morphTo();
    }

    /**
     * The orders that belong to the price product.
     */
    public function orders()
    {
        return $this->belongsToMany('App\Models\Order')
            ->using('App\Models\OrderPrice')
            ->withPivot([
                'price',
                'title',
                'quantity',
            ]);
    }
}
