<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PizzaVariantResource extends JsonResource
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
            'price' => $this->price->price,
            'image' => $this->image->path,
            'image_size' => (!isset($this->size->id)) ? 100 : ceil(50 + (50/3*($this->size->id))).'%',
            'tree' => [$this->size->id ?? null, $this->crust->id ?? null],
            'size_id' => $this->size->id ?? null,
            'crust_id' => $this->crust->id ?? null,
        ];
    }
}
