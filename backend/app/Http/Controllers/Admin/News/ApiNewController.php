<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Dotenv\Validator;
use Illuminate\Http\Request;

class ApiNewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(News::all());
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
            "new_title"=>["required","unique:news"],
            "new_description"=>["required","min:6"],
            "new_img"=>["required","image","max:2048"],
        ];
        $messages=[
            "required"=>":attribute chưa nhập!",
            "unique"=>":attribute đã tồn tại!",
            "min"=>":attribute tôi thiểu :min kí tự",
            "image"=>"Đây không phải là hình ảnh",
            "max"=>":attribute vượt quá 2MB",
        ];
        $attributes=[
            "new_title"=>"Tiêu đề",
            "new_description"=>"Miêu tả tin",
            "new_img"=>"Hình ảnh"
        ];
        $validator=Validator($request->all(),$rules,$messages,$attributes);
        if($validator->fails()){
            return response()->json($validator->errors(),401);
        }else{
            $file=$request->file("new_img");
            $fileName=time()."-".$file->getClientOriginalName();
            $file->move(public_path("images",$fileName));
            $new=new News();
            $new->new_title=$request->new_title;
            $new->new_description=$request->new_description;
            $new->new_img="images/".$fileName;
            $new->save();
            return response()->json($request->all());
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
