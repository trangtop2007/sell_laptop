<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiRelationProduct;
use App\Models\Product;
use Illuminate\Http\Request;
class ApiDetailProduct extends Controller
{
    //
    public function getProductRelation(string $product_name){
        return response()->json(ApiRelationProduct::collection(Product::where("product_name",$product_name)->get()));
    }
}
