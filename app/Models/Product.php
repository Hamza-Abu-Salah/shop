<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table ="products";
    protected $fillable = ['title','content','text_btn','price','categories_id','sale_price','quantity','image1','added_by','come_code','updated_by','active'];
}
