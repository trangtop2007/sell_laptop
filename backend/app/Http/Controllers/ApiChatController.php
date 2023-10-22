<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApiChatCollection;
use App\Http\Resources\ApiChatResource;
use App\Models\Chat;
use Dotenv\Validator;
use Illuminate\Http\Request;

class ApiChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(ApiChatResource::collection(Chat::orderBy("created_at","desc")->get()));
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
            "chat_content"=>["required","min:6"],
            
        ];
        $messages=[
            "chat_content.required"=>"Chưa nhập bình luận!",
            "chat_content.min"=>"Bình luận tối thiểu :min kí tự!"
        ];
        $validator=Validator($request->all(),$rules,$messages);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        else{
            $chat=new Chat;
            $chat->user_id=$request->user_id;
            $chat->chat_content=$request->chat_content;
            $chat->save();
            return response()->json($request->all());;
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
