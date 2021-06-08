<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlantProductResource extends JsonResource
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
            "id" => $this->id,
            "category_id" => $this->category_id,
            "title" => $this->title,
            "slug" => $this->slug,
            "description" => $this->description,
            "selling_price" => $this->selling_price,
            "discount_price" => $this->discount_price,
            "stock" => $this->stock == null ? 1 : $this->stock,
            "sku" => $this->sku,
            "is_available" => $this->is_available == null ? 0 : $this->is_available,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }
}
