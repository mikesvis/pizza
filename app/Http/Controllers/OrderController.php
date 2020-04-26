<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Price;
use App\Models\Delivery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\OrderResource;
use App\Http\Requests\Orders\CreateOrderRequest;

class OrderController extends Controller
{
    /**
     * Create new order
     *
     * @param CreateOrderRequest $request
     * @return array
     */
    public function create(CreateOrderRequest $request)
    {

        $order = new Order();
        $order->uuid = Str::uuid();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->user_currency = $request->user_currency;

        $order->save();
        $subTotal = 0;

        foreach ($request->ids as $price_id => $quantity) {
            $price = Price::with('priceable')->find($price_id);
            if(!empty($price)){
                $subTotal += (int)$quantity * $price->price;
                $order->prices()->save($price, [
                    'title' => $price->priceable->title,
                    'price' => $price->price,
                    'quantity' => (int)$quantity
                ]);
            }
        }

        $order->delivery_fee = (new Delivery())->fee($subTotal);
        $order->total = $subTotal + $order->delivery_fee;
        $order->save();

        return ['uuid' => $order->uuid];

    }

    /**
     * Show requested order
     */
    public function show($orderUuid)
    {
        $order = Order::where('uuid', $orderUuid)->with(['prices', 'prices.priceable'])->first();

        if(empty($order)){
            return response()->json(['message' => 'Not Found!'], 404);
        }

        return new OrderResource($order);
    }
}
