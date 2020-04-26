<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    public function simple()
    {
        return [
            'price' => 10,
            'free_above' => 30
        ];
    }

    public function fee($subTotal)
    {
        $prices = $this->simple();

        if($subTotal < $prices['free_above']) {
            return $prices['price'];
        }

        return 0;
    }
}
