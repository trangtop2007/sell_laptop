<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiRelationProduct extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "product_memory"=>$this->product_memory,
            "product_ram"=>$this->product_ram,
            "product_id"=>$this->id,
            "product_price"=>$this->product_price
        ];    
    }
}
