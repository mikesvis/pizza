<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PizzaResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image->path,
            'pricing' => [
                'type' => 'complex',
                'prefix' => 'from',
                'price' => $this->cheapest->price,
                'id' => $this->cheapest->id,
            ],
        ];
    }
}
