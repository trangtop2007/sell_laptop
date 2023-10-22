<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApiCartProduct;
use App\Http\Resources\ApiCartProductResource;
use App\Models\Cart;
use Dotenv\Validator;
use Faker\Core\Number;
use Illuminate\Http\Request;

class ApiCartCotnroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(Cart::all());
    }
    public function getDataByUserId($id){
        return response()->json(ApiCartProductResource::collection(Cart::where("user_id",$id)->get()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules=[
            "user_id"=>["required","exists:users,id"],
            "product_id"=>["required","exists:products,id"],
        ];
        $validator=Validator($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        else{
            if(Cart::where("user_id",$request->user_id)->where("product_id",$request->product_id)->get()->count()>0){
                $cart=Cart::where("user_id",$request->user_id)->where("product_id",$request->product_id)->first();
                $cart->product_amount=intval($cart->product_amount)+1;
                $cart->save();
            }
            else{
                $cart=new Cart;
                $cart->user_id=$request->user_id;
                $cart->product_id=$request->product_id;
                $cart->save();
            }
            return response()->json(["status"=>"OK"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
