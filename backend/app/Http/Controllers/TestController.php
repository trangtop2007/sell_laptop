<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class TestController extends Controller
{
    //
    public function index(){
        return view("test");
    }
   
}
