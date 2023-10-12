<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiShowProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
   
                "product_id" => $this->id,
                "product_title" => $this->product_title,
                "product_price" => $this->product_price,
                "product_capacity" => $this->product_capacity,
                "product_ram" => $this->product_ram,
                "product_guarantee" => $this->product_guarantee,
                "product_amount" => $this->product_amount,
                "product_memory" => $this->product_memory,
                "product_name" => $this->product_name,
                "product_image" => $this->product_image,
                "product_description" => $this->product_description,
                "product_category" => Category::getNameById($this->product_category_id),
                "product_memory" => $this->product_memory,
                "product_memory" => $this->product_memory,
                "product_memory" => $this->product_memory,
                "created_at"=>$this->created_at,
                "updated_at"=>$this->updated_at
            
        ];
    }
}
