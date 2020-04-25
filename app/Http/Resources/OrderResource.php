<?php

namespace App\Http\Resources;

use App\Http\Resources\OrderPriceResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $items = [];

        foreach ($this->prices as $price) {
            $items[] = new OrderPriceResource($price);
        }


        return [
            'id' => $this->id,
            'number' => '#'.$this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'address' => $this->address,
            'delivery_fee' => $this->delivery_fee,
            'total' => $this->total,
            'items' => $items
        ];
    }
}
