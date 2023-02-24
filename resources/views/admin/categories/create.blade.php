@extends('admin.include.master')

@section('title', 'Dashboard')
@section('titlecontent')

categories
@endsection

@section('contentheaderlink')
    <a href="{{ route('admin.categories.index') }}"> Categories </a>

@endsection


@section('namecontent')
    Dashboard
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            @include('layouts.error')
            @include('layouts.success')
            <div class="card-header">
                <h3 class="card-title card_title_center">اضافة منتجات </h3>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="">name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>شعار الشركة</label>
                                <div class="image">
                                    <img class="custom_imgs3" src=""
                                        alt="لوجو الشركة">
                                    <button type="button" class="btn btn-sm btn-danger" id="update_images3">تغير
                                        الصورة</button>
                                    <button type="button" class="btn btn-sm btn-danger" style="display: none;"
                                        id="cancel_update_images3"> الغاء</button>

                                        @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div id="oldimages3">

                            </div>


                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">content</label>
                                <textarea name="content" id="content" class="form-control" cols="30" rows="" >{{ old('content') }}</textarea>
                                @error('content')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>active</label>
                                <select name="active" id="active" class="form-control">
                                    <option value="">اختر الحالة</option>
                                    <option @if (old('active') == 1 || old('active') == '') selected="selected" @endif value="1"> نعم
                                    </option>
                                    <option @if (old('active') == 0 and old('active') != '') selected="selected" @endif value="0"> لا
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
                                <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-danger">الغاء</a>

                            </div>
                        </div>
                    </div>



                </form>
            </div>
        </div>



        </div>
    </section>
@stop

@section('script')

<script src="{{ asset('adminassets/js/adminPanel.js') }}"></script>

@stop
