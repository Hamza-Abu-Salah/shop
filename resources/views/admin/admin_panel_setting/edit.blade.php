@extends('admin.include.master')

@section('title', 'Dashboard')
@section('titlecontent')

Settings
@endsection

@section('contentheaderlink')
    <a href="{{ route('admin.admin_panel_settings.index') }}"> Settings </a>

@endsection


@section('namecontent')
    Edit
@endsection


@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title card_title_center">تعديل بيانات الضبط العام</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

                <form action="{{ route('admin.admin_panel_settings.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>اسم الشركة</label>
                                <input name="system_name" id="system_name" class="form-control"
                                    value="{{ $data['system_name'] }}" placeholder="ادخل اسم الشركة"
                                    oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')"
                                    onchange="try{setCustomValidity('')}catch(e){}">
                                @error('system_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>عنوان الشركة</label>
                                <input name="address" id="address" class="form-control" value="{{ $data['address'] }}"
                                    placeholder="ادخل اسم الشركة" oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')"
                                    onchange="try{setCustomValidity('')}catch(e){}">
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>هاتف الشركة</label>
                                <input name="phone" id="phone" class="form-control" value="{{ $data['phone'] }}"
                                    placeholder="ادخل اسم الشركة" oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')"
                                    onchange="try{setCustomValidity('')}catch(e){}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label> ملاحظات </label>
                                <textarea name="notes" id="notes" class="form-control">{{ $data['notes'] }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>رسالة تنبية اعلي الشاشة </label>
                                <input name="general_alert" id="general_alert" class="form-control"
                                    value="{{ $data['general_alert'] }}" placeholder="ادخل اسم الشركة"
                                    oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')"
                                    onchange="try{setCustomValidity('')}catch(e){}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>شعار الشركة</label>
                                <div class="image">
                                    <img class="custom_img4" src="{{ asset('uploads') . '/' . $data['photo'] }}"
                                        alt="لوجو الشركة">
                                    <button type="button" class="btn btn-sm btn-danger" id="update_image4">تغير
                                        الصورة</button>
                                    <button type="button" class="btn btn-sm btn-danger" style="display: none;"
                                        id="cancel_update_image4"> الغاء</button>


                                </div>
                            </div>
                            <div id="oldimage4">

                            </div>


                        </div>
                        <div class="col-md-12">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-sm">حفظ التعديلات</button>
                            </div>
                        </div>
                    </div>
                </form>



        </div>
    </div>


@endsection


@section('script')

<script src="{{ asset('adminassets/js/adminPanel.js') }}"></script>

@endsection
