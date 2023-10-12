<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiProduct;
use App\Http\Resources\ApiProductResource;
use App\Http\Resources\ApiShowProductResource;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Dotenv\Validator;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $s = strtolower(request("s", ""));
        
        return  response()->json(new ApiProductResource((Product::where("product_name","like","%".$s."%")->get())),200);
        
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
        $rules = [
            "product_title" => ["required", "unique:products"],
            "product_name" => ["required"],
            "product_price" => ["required", "int"],
            "product_capacity" => ["required", "int"],
            "product_ram" => ["required"],
            "product_description" => ["required", "min:20"],
            "product_category" => ["required"],
            "product_memory" => ["required"],
            "product_amount" => ["required"],
            "product_guarantee" => ["required"],
            "product_image" => ["required", "image", "max:2048"]
        ];
        $messages = [
            "required" => ":attribute chưa nhập!",
            "int" => ":attribute phải là số!",
            "min" => ":attribute tối thiểu :min kí tự!",
            "product_image.max" => ":attribute tối đa dung lượng 2 MB!",
            "product_image.image" => "Đây phải là hình ảnh!",
            "unique" => ":attribute đã tồn tại!"
        ];
        $attributes = [
            "product_title" => "Tiêu đề",
            "product_name" => "Tên sản phẩm",
            "product_price" => "Giá sản phẩm",
            "product_capacity" => "Dung lương ",
            "product_ram" => "Ram",
            "product_description" => "Mô tả",
            "product_category" => "Hãng sản xuất",
            "product_memory" => "Bộ nhớ",
            "product_amount" => "Số lượng",
            "product_guarantee" => "Bảo hành",
            "product_image" => "Hình ảnh"
        ];

        $validator = Validator($request->all(), $rules, $messages, $attributes);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {
            $file = $request->file("product_image");
            $fileName = time() . "-" . $file->getClientOriginalName();
            $file->move(public_path("images"), $fileName);
            $file_path = "images/" . $fileName;
            $product = new Product;
            $product->product_title = $request->product_title;
            $product->product_name = $request->product_name;
            $product->product_price = $request->product_price;
            $product->product_ram = $request->product_ram;
            $product->product_memory = $request->product_memory;
            $product->product_capacity = $request->product_capacity;
            $product->product_amount = $request->product_amount;
            $product->product_guarantee = $request->product_guarantee;
            $product->product_category_id = Category::getIdByName(strtoupper($request->product_category));
            $product->product_description = $request->product_description;
            $product->product_image = $file_path;
            $product->save();
            return response()->json(["message" => "Thêm sản phẩm thành công!"], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return response()->json(ApiShowProductResource::make(Product::find($id)));
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
        $rules = [
            "product_title" => ["required"],
            "product_name" => ["required"],
            "product_price" => ["required", "int"],
            "product_capacity" => ["required", "int"],
            "product_ram" => ["required"],
            "product_description" => ["required", "min:20"],
            "product_category" => ["required"],
            "product_memory" => ["required"],
            "product_amount" => ["required"],
            "product_guarantee" => ["required"],
            "product_image" => ["required", "image", "max:2048"]
        ];
        $messages = [
            "required" => ":attribute chưa nhập!",
            "int" => ":attribute phải là số!",
            "min" => ":attribute tối thiểu :min kí tự!",
            "product_image.max" => ":attribute tối đa dung lượng 2 MB!",
            "product_image.image" => "Đây không phải là hình ảnh!",
            "unique" => ":attribute đã tồn tại!"
        ];
        $attributes = [
            "product_title" => "Tiêu đề",
            "product_name" => "Tên sản phẩm",
            "product_price" => "Giá sản phẩm",
            "product_capacity" => "Dung lương ",
            "product_ram" => "Ram",
            "product_description" => "Mô tả",
            "product_category" => "Hãng sản xuất",
            "product_memory" => "Bộ nhớ",
            "product_amount" => "Số lượng",
            "product_guarantee" => "Bảo hành",
            "product_image" => "Hình ảnh"
        ];
        $validator = Validator($request->all(), $rules, $messages, $attributes);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {
            $file = $request->file("product_image");
            $fileName = time() . "-" . $file->getClientOriginalName();
            $file->move(public_path("images"), $fileName);
            $file_path = "images/" . $fileName;
            $product = Product::find($id);
            $product->product_title = $request->product_title;
            $product->product_name = $request->product_name;
            $product->product_price = $request->product_price;
            $product->product_ram = $request->product_ram;
            $product->product_memory = $request->product_memory;
            $product->product_capacity = $request->product_capacity;
            $product->product_amount = $request->product_amount;
            $product->product_guarantee = $request->product_guarantee;
            $product->product_category_id = Category::getIdByName(strtoupper($request->product_category));
            $product->product_description = $request->product_description;
            $product->product_image = $file_path;
            $product->save();
            return response()->json(Category::getIdByName(strtoupper($request->category)));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        return response()->json(["message" => "Delete OK"], 200);
    }
}
