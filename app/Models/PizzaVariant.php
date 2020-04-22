<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PizzaVariant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['crust_id', 'pizza_id', 'size_id', 'title', 'weight'];

    /**
     * Crust relation
     *
     * @return void
     */
    public function crust()
    {
        return $this->belongsTo('App\Models\Crust');
    }

    /**
     * Pizza relation
     *
     * @return void
     */
    public function pizza()
    {
        return $this->belongsTo('App\Models\Pizza');
    }

    /**
     * Size relation
     *
     * @return void
     */
    public function size()
    {
        return $this->belongsTo('App\Models\Size');
    }

    /**
     * Morph relation to price
     *
     * @return void
     */
    public function price()
    {
        return $this->morphOne('App\Models\Price', 'priceable');
    }

    /**
     * Morph relation to image
     *
     * @return void
     */
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }

}
