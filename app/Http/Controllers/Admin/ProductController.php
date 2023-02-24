<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Categories;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
          $come_code = auth()->user()->come_code;
        $data = Product::select("*")->orderby('id','DESC')->paginate(10);
        if(!empty($data)){
            foreach($data as $info){
                $info->added_by_admin = User::where('id',$info->added_by)->value('name');
                if($info->updated_by > 0 and $info->updated_by != null){
                    $info->updated_by_admin = User::where('id',$info->updated_by)->value('name');
                }
                $info->categories_id_name = Categories::where('id',$info->categories_id)->value('name');
            }
        }
        return view('admin.product.index',compact('data'));
    }

    public function create()
    {
        $come_code = auth()->user()->come_code;
        $categories_id = Categories::select("id","name")->where(['come_code'=>$come_code])->orderby('id','DESC')->get();
        return view('admin.product.create',compact('categories_id'));
    }

    public function store(ProductRequest $request)
    {
        try{
            $come_code = auth()->user()->come_code;
            $data = Product::select("id")->where(['title' =>$request->title,'come_code'=>$come_code])->orderby('id','DESC')->first();
            if(!empty($data)){
                return redirect()->back()->with(['error'=>'عفوا العنوان مكرر']);
            }
            $row = Product::select("id")->where(["come_code" => $come_code])->orderby('id', 'DESC')->first();
            if (!empty($row)) {
                $data_insert['id'] = $row['id'] + 1;
            } else {
                $data_insert['id'] = 1;
            }
            $data_insert['title'] = $request->title;
            $data_insert['content'] = $request->content;
            $data_insert['text_btn'] = $request->text_btn;
            $data_insert['categories_id'] = $request->categories_id;
            $data_insert['added_by'] =auth()->user()->id;
            $data_insert['create_at'] =date("Y-m-d");
            $data_insert['come_code'] =$come_code;
            $data_insert['price'] =$request->price;
            $data_insert['sale_price'] =$request->sale_price;
            $data_insert['quantity'] =$request->quantity;
            $img_name = rand().time().$request->file('image1')->getClientOriginalName();
            $request->file('image1')->move(public_path('uploads'), $img_name);
            $data_insert['image1'] =$img_name;
            $data_insert['active'] =$request->active;

            Product::create($data_insert);
            return redirect()->route('admin.product.index')->with(['success'=>'تم اضافة البيانات بنجاح']);
        }catch(\Exception $ex){
            return redirect()->back() ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])->withInput();

        }
    }

    public function edit($id)
    {
        $come_code = auth()->user()->come_code;
        $categories_id = Categories::select("id","name")->where(['come_code'=>$come_code])->orderby('id','DESC')->get();

        $data = Product::select("*")->where(['id'=>$id,'come_code'=>$come_code])->first();
        return view('admin.product.edit',compact('data','categories_id'));
    }

    public function update($id,ProductRequest $request)
    {
        try{
            $come_code = auth()->user()->come_code;
            $data = Product::select("*")->where(['id'=>$id,'come_code'=>$come_code])->first();

            $checkExists = Product::select("id")->where(['title' =>$request->title,'come_code'=>$come_code])->where('id','!=',$id)->orderby('id','DESC')->first();
            if(!empty($checkExists)){
                return redirect()->back()->with(['error'=>'عفوا العنوان مكرر']);
            }
            $row = Product::select("id")->where(["come_code" => $come_code])->orderby('id', 'DESC')->first();
            if (!empty($row)) {
                $data_insert['id'] = $row['id'] + 1;
            } else {
                $data_insert['id'] = 1;
            }
            $data_insert_update['title'] = $request->title;
            $data_insert_update['content'] = $request->content;
            $data_insert_update['text_btn'] = $request->text_btn;
            $data_insert_update['updated_by'] =auth()->user()->id;
            $data_insert_update['categories_id'] = $request->categories_id;
            $data_insert_update['updated_at'] =date("Y-m-d");
            $data_insert_update['price'] =$request->price;
            $data_insert_update['sale_price'] =$request->sale_price;
            $data_insert_update['quantity'] =$request->quantity;
            $data_insert_update['come_code'] =$come_code;
            $img_name = $data->image1;

        if($request->hasFile('image1')) {
            $img_name = rand().time().$request->file('image1')->getClientOriginalName();
            $request->file('image1')->move(public_path('uploads'), $img_name);
        }
            $data_insert_update['image1'] =$img_name;
            $data_insert_update['active'] =$request->active;

            Product::where(['id'=>$id])->update($data_insert_update);
            return redirect()->route('admin.product.index')->with(['success'=>'تم التحديث البيانات بنجاح']);
        }catch(\Exception $ex){
            return redirect()->back() ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])->withInput();

        }
    }

    public function delete($id)
    {
        // Post::destroy($id);
        $data = Product::find($id);
        File::delete(public_path('uploads/'.$data->image1));
        File::delete(public_path('uploads/'.$data->image2));
        File::delete(public_path('uploads/'.$data->image3));
        $data->delete();
        return redirect()->back();
    }

}
