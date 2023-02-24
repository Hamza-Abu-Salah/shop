<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartsController extends Controller
{
    public function add_to_cart(Request $request)
    {
        try {
            $request->validate([
                'quantity' => 'gt:0',
                'product_id' => 'exists:products,id'
            ]);

            $product = Product::select("price")->find($request->product_id);
            $cart = Carts::where('product_id', $request->product_id)->where('user_id', Auth::id())->first();
            if ($cart) {
                $cart->increment('quantity', $request->quantity);
            } else {
                // $data_insert['price'] = $request->price;
                // $data_insert['quantity'] = $request->quantity;
                // $data_insert['quantity'] = $request->quantity;
                // $data_insert['user_id'] = Auth::id();
                // Carts::create($data_insert);
                Carts::create([
                    'price' => $product->price,
                    'quantity' => $request->quantity,
                    'product_id' => $request->product_id,
                    'user_id' => Auth::id(),
                ]);
            }

            return redirect()->back()->with(['success' => 'تم الاضافة بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'حدث خطأ ما' . $ex->getMessage()]);
        }
    }
    public function cart()
    {
        $carts = auth()->user()->carts;
        foreach($carts as $cart) {
            $product = Product::find($cart->product_id);
            if (isset($product)) {
                $cart->product = $product;
            }
        }
        return view('website.shop.cart', compact('carts'));
    }
}
