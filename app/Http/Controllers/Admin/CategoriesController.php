<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoriesController extends Controller
{
    public function index()
    {
        $come_code = auth()->user()->come_code;
        $data = Categories::select("*")->orderby('id', 'DESC')->paginate(10);
        if (!empty($data)) {
            foreach ($data as $info) {
                $info->added_by_admin = User::where('id', $info->added_by)->value('name');
                if ($info->updated_by > 0 and $info->updated_by != null) {
                    $info->updated_by_admin = User::where('id', $info->updated_by)->value('name');
                }
            }
        }
        return view('admin.categories.index', compact('data'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoriesRequest $request)
    {
        try {
            $come_code = auth()->user()->come_code;
            $data = Categories::select("id")->where(['name' => $request->name, 'come_code' => $come_code])->orderby('id', 'DESC')->first();
            if (!empty($data)) {
                return redirect()->back()->with(['error' => 'عفوا العنوان مكرر']);
            }
            $row = Categories::select("id")->where(["come_code" => $come_code])->orderby('id', 'DESC')->first();
            if (!empty($row)) {
                $data_insert['id'] = $row['id'] + 1;
            } else {
                $data_insert['id'] = 1;
            }
            $data_insert['name'] = $request->name;
            $data_insert['content'] = $request->content;
            $data_insert['added_by'] = auth()->user()->id;
            $data_insert['create_at'] = date("Y-m-d");
            $data_insert['come_code'] = $come_code;
            $img_name = rand() . time() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'), $img_name);
            $data_insert['image'] = $img_name;
            $data_insert['active'] = $request->active;

            Categories::create($data_insert);
            return redirect()->route('admin.categories.index')->with(['success' => 'تم اضافة البيانات بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])->withInput();
        }
    }

    public function edit($id)
    {
        $come_code = auth()->user()->come_code;
        $data = Categories::select("*")->where(['id' => $id, 'come_code' => $come_code])->first();
        return view('admin.categories.edit', compact('data'));
    }

    public function update($id,Request $request)
    {
        try{
            $come_code = auth()->user()->come_code;
            $data = Categories::select("*")->where(['id'=>$id,'come_code'=>$come_code])->first();

            $checkExists = Categories::select("id")->where(['name' =>$request->name,'come_code'=>$come_code])->where('id','!=',$id)->orderby('id','DESC')->first();
            if(!empty($checkExists)){
                return redirect()->back()->with(['error'=>'عفوا العنوان مكرر']);
            }
            $row = Categories::select("id")->where(["come_code" => $come_code])->orderby('id', 'DESC')->first();
            if (!empty($row)) {
                $data_insert['id'] = $row['id'] + 1;
            } else {
                $data_insert['id'] = 1;
            }
            $data_insert_update['name'] = $request->name;
            $data_insert_update['content'] = $request->content;
            $data_insert_update['updated_by'] =auth()->user()->id;
            $data_insert_update['updated_at'] =date("Y-m-d");
            $data_insert_update['come_code'] =$come_code;
            $img_name = $data->image;

        if($request->hasFile('image')) {
            $img_name = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'), $img_name);
        }

            $data_insert_update['image'] =$img_name;
            $data_insert_update['active'] =$request->active;

            Categories::where(['id'=>$id])->update($data_insert_update);
            return redirect()->route('admin.categories.index')->with(['success'=>'تم التحديث البيانات بنجاح']);
        }catch(\Exception $ex){
            return redirect()->back() ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])->withInput();

        }
    }

    public function delete($id)
    {
        $data = Categories::find($id);
        File::delete(public_path('uploads/'.$data->image));
        $data->delete();
        return redirect()->back();
    }

}
