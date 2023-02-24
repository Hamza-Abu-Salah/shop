<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $slider_product = Product::select("*")->orderby('id', 'DESC')->limit(3)->get();
        $last_categories = Categories::select("*")->orderby('id', 'DESC')->limit(3)->get();
        $last_product = Product::select("*")->orderby('id', 'DESC')->limit(9)->offset(3)->get();

        return view('website.home.index', compact('slider_product', 'last_categories', 'last_product'));
    }

    public function shop()
    {
        $product = product::orderByDesc('id')->paginate(9);

        return view('website.shop.index', compact('product'));
    }

    public function category($id)
    {
        $category = Categories::where(['id'=>$id])->orderByDesc('id')->paginate(9);
        $product = Product::select("*")->where(['id'=>$id])->get();

        return view('website.shop.categories', compact('category','product'));
    }

    public function show(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id;
            $data = Product::select("*")->where(['id' => $id])->first();
            return view('website.shop.show', compact('data'));
        }
    }



    public function single_product($id)
    {
        $product = Product::findOrfail($id);



        return view('website.home.single_product', compact('product'));
    }
}
