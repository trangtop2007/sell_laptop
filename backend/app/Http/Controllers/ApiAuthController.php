<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\alert;

class ApiAuthController extends Controller
{
    //
    public function register(Request $request){
        $rules=[
            "fullname"=>["required","min:6"],
            "username"=>["required","min:6","unique:users"],
            "phone"=>["required","regex:/^(0|\+84)\d{9}$/"],
            "address"=>["required"],
            "password"=>["required","min:6"],
            "password_confirmation"=>["required","same:password"],
            "check_policy"=>["required",function($attribute,$value,$fail){
                if($value!="true"){
                    $fail("Không đồng ý với chính sách!");
                }
            },"sometimes"]
        ];
        $messages=[
            "required"=>":attribute chưa nhập!",
            "min"=>":attribute tối thiểu :min k tự!",
            "unique"=>":attribute đã tồn tại!",
            "regex"=>":attribute không hợp lệ!",
            "same"=>":attribute không chính xác!",
        ];
        $attributes=[
            "fullname"=>"Họ và tên",
            "username"=>"Tên tài khoản",
            "phone"=>"Số điện thoại",
            "address"=>"Địa chỉ",
            "password"=>"Mật khẩu",
            "password_confirmation"=>"Xác nhận mật khẩu",
        ];
        $validator=Validator($request->all(),$rules,$messages,$attributes);
        if($validator->fails()){
            return response()->json($validator->errors(),401);
        }
        else{
            $user=new User;
            $user->fullname=$request->fullname;
            $user->username=$request->username;
            $user->password=Hash::make($request->password);
            $user->phone=$request->phone;
            $user->address=$request->address;
            
            $user->save();
            return response()->json($request->all());
        }
    }
    public function login(Request $request){
        $rules=[
            "username"=>["required","exists:users"],
            "password"=>["required"],
        ];
        $messages=[
            "required"=>":attribute chưa nhập!",
            "exists"=>":attribute không tồn tại!",
        ];
        $attributes=[
            "username"=>"Tên đăng nhập",
            "password"=>"Mật khẩu"
        ];
        $validator=Validator($request->all(),$rules,$messages,$attributes);
        if($validator->fails()){
            return response()->json($validator->errors(),401);
        }
        else{
            if(Auth::attempt([
                "username"=>$request->username,
                "password"=>$request->password
            ],$request->rememberMe)){
                $user=User::where("username",$request->username)->first();
                $user->token=$user->createToken("token")->accessToken;
                return response()->json($user);
            }
            $validator->errors()->add("password","Mật khẩu không chính xác!");
            return response()->json($validator->errors(),401);
        }


    }
    public function user(){
        return response()->json(Auth::guard("api")->user());
    }
    
}
