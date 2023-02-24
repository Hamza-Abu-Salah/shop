<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPanelRequest;
use App\Models\Admin_panel_settings;
use App\Models\User;
use Illuminate\Http\Request;

class Admin_panel_settingsController extends Controller
{
    public function index()
    {
        $come_code = auth()->user()->come_code;
        $data = Admin_panel_settings::where(['come_code'=>$come_code])->first();
        if (!empty($data)) {
            //بنجيب اسم المستخدم الي عملت تحديث عليه
            if ($data['updated_by'] > 0 and $data['updated_by'] != null) {
                //بحكيلو انو id بساوي adminالي عمل تحديث
                $data['updated_by_admin'] = User::where('id', $data['updated_by'])->value('name');

            }
        }
        return view('admin.admin_panel_setting.index',compact('data'));
    }
    public function edit()
    {
        $data = Admin_panel_settings::where('come_code', auth()->user()->come_code)->first();
        return view('admin.admin_panel_setting.edit',compact('data'));
    }

    public function update(AdminPanelRequest $request)
    {
        try{
            $admin_panel_setting = Admin_panel_settings::where('come_code', auth()->user()->come_code)->first();
            $admin_panel_setting->system_name = $request->system_name;
            $admin_panel_setting->address = $request->address;
            $admin_panel_setting->phone = $request->phone;
            $admin_panel_setting->general_alert = $request->general_alert;
            $admin_panel_setting->updated_by = auth()->user()->id;
            $admin_panel_setting->updated_at = date("Y-m-d H:i:s");
            $oldphotoPath = $admin_panel_setting->photo;
            $img_name = rand().time().$request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('uploads'), $img_name);
            $admin_panel_setting->photo = $request->photo;

            $admin_panel_setting->save();
            return redirect()->route('admin.admin_panel_settings.index')->with(['success' => 'تم تحديث البيانات بنجاح']);

        }catch(\Exception $ex){
            return redirect()->route('admin.admin_panel_settings.index')->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()]);

        }

    }
}
