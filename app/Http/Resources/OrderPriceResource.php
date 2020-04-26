<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderPriceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'price' => $this->pivot->price,
            'title' => $this->pivot->title,
            'quantity' => $this->pivot->quantity,
            'image' => $this->priceable->image->path ?? null
        ];
    }
}
