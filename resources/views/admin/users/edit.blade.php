@extends('admin.include.master')

@section('title', 'Dashboard')
@section('titlecontent')

    Users
@endsection

@section('contentheaderlink')
    <a href="{{ route('admin.users.index') }}"> user </a>

@endsection


@section('namecontent')
    Dashboard
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card-header">
                <h3 class="card-title card_title_center">تعديل بيانات المستخدمين </h3>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.users.update',$data['id']) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="">الاسم</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name',$data['name']) }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">الايميل</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email',$data['email']) }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">الهاتف</label>
                                <input type="text" class="form-control" name="phone" value="{{ old('phone',$data['phone']) }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">العنوان</label>
                                <input type="text" class="form-control" name="address" value="{{ old('address',$data['address']) }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label> حالة التفعيل</label>
                                <select name="active" id="active" class="form-control">
                                    <option value="">اختر الحالة</option>
                                    <option @if (old('active',$data['active']) == 1 || old('active',$data['active']) == '') selected="selected" @endif value="1"> نعم
                                    </option>
                                    <option @if (old('active',$data['active']) == 0 and old('active',$data['active']) != '') selected="selected" @endif value="0"> لا
                                    </option>
                                </select>
                                @error('active')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group text-center mt-3">
                                <button  type="submit" class="btn btn-primary btn-sm"> اضافة</button>
                                <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-danger">الغاء</a>

                            </div>
                        </div>
                    </div>



                </form>
            </div>
        </div>



        </div>
    </section>
@stop
