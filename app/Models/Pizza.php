<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description'];

    /**
     * Relation to variants
     *
     * @return void
     */
    public function variants()
    {
        return $this->hasMany('App\Models\PizzaVariant');
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
