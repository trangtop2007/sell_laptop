<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ApiProductResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "data" => $this->collection->map(function ($item) {
                return [
                    "product_id" => $item->id,
                    "product_title" => $item->product_title,
                    "product_price" => $item->product_price,
                    "product_capacity" => $item->product_capacity,
                    "product_ram" => $item->product_ram,
                    "product_guarantee" => $item->product_guarantee,
                    "product_amount" => $item->product_amount,
                    "product_memory" => $item->product_memory,
                    "product_image" => $item->product_image
                ];
            })
        ];
    }
}
