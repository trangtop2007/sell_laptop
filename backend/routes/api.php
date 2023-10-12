<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiCartCotnroller;
use App\Http\Controllers\Products\ApiDetailProduct;
use App\Http\Controllers\Products\ApiProductController;
use App\Http\Controllers\TestController;
use App\Http\Resources\ApiUserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post("/register",[ApiAuthController::class,"register"]);
Route::post("/login",[ApiAuthController::class,"login"]);
Route::get("/user",[ApiAuthController::class,"user"]);

Route::apiResource("/admin/product",ApiProductController::class)->except("update");
Route::post("/admin/product/{id}",[ApiProductController::class,"update"]);
Route::get("/product/getRelation/{product_name}",[ApiDetailProduct::class,"getProductRelation"]);

Route::apiResource("cart",ApiCartCotnroller::class);
Route::get("cart/u/{id}",[ApiCartCotnroller::class,"getDataByUserId"]);