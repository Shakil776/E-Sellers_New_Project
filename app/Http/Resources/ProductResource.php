<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'category_id' => $this->category_id,
            'manufacturer_id' => $this->manufacturer_id,
            'product_name' => $this->product_name,
            'product_price' => $this->product_price,
            'product_quantity' => $this->product_quantity,
            'short_description' => $this->short_description,
            'long_description' => $this->long_description,
            'product_image' => $this->product_image,
            'publication_status' => $this->publication_status,
        ];
    }
}
