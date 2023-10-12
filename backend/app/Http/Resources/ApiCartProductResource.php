<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiCartProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "user_id"=>$this->user_id,
            "product_amount"=>$this->product_amount,
            "product"=>ApiShowProductResource::make(Product::find($this->product_id))
        ];
    }
}
