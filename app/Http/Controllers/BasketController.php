<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;
use App\Http\Resources\BasketItemsResource;

class BasketController extends Controller
{
    public function index(Request $request)
    {
        $items = Price::whereIn('id', $request->id)->whereHasMorph('priceable', ['App\Models\PizzaVariant'])->get();

        $result = [
            'items' => BasketItemsResource::collection($items),
            'delivery' => [
                'price' => 10,
                'free_above' => 20
            ]
        ];

        return $result;
    }
}
