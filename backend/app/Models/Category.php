<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table="categories";
    public static function getIdByName($name){
        return Category::where("category_name",$name)->first()->id??0;
    }
    public static function getNameById($id){
        return Category::where("id",$id)->first()->category_name;

    }
}
