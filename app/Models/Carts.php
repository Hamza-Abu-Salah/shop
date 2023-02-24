<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;
    protected $table ="carts";
    protected $fillable = ['price','quantity','product_id','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function product() {
        return $this->belongsTo(Product::class)->withDefault();
    }
}
