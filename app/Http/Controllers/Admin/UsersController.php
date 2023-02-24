<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUsersRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $come_code = auth()->user()->come_code;
        $data = User::select("*")->orderby('id','DESC')->paginate(10);
        if(!empty($data)){
            foreach($data as $info){
                $info->added_by_admin = User::where('id',$info->added_by)->value('name');
                if($info->updated_by > 0 and $info->updated_by != null){
                    $info->updated_by_admin = User::where('id',$info->updated_by)->value('name');
                }
            }
        }
        return view('admin.users.index',compact('data'));
    }

    public function edit($id)
    {
        $data = User::select("*")->find($id);
        return view('admin.users.edit',compact('data'));
    }

    public function update($id,Request $request)
    {

        try{

            $data = User::select("id")->where(["id" => $id])->first();
            if (empty($data)) {
                return redirect()->route('admin.users.index')->with(['error' => 'عفوا غير قادر علي الوصول الي البيانات المطلوبة !!']);
            }

            $checkExists = User::where(['name' => $request->name])->where('id', '!=', $id)->first();


            if ($checkExists != null) {
                return redirect()->back()
                    ->with(['error' => 'عفوا اسم المستخدم مسجل من قبل'])
                    ->withInput();
            }

            $data_to_update['name'] = $request->name;
            $data_to_update['phones'] = $request->phones;
            $data_to_update['address'] = $request->address;
            $data_to_update['email'] = $request->address;
            $data_to_update['notes'] = $request->notes;
            $data_to_update['active'] = $request->active;
            $data_to_update['updated_by'] = auth()->user()->id;
            $data_to_update['updated_at'] = date("Y-m-d H:i:s");
            $flag  = User::where(['id'=>$id])->update($data_to_update);
            return redirect()->route('admin.users.index')->with(['success' => 'لقد تم اضافة البيانات بنجاح']);

        }catch(\Exception $ex){
            return redirect()->back() ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])->withInput();
        }
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('msg','Trainer deleted successfully')->with('type','danger');
    }
}
