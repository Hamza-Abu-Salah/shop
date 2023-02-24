@extends('admin.include.master')

@section('title', 'Dashboard')
@section('titlecontent')

    product
@endsection

@section('contentheaderlink')
    <a href="{{ route('admin.product.index') }}"> Product </a>

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
                <h3 class="card-title card_title_center">تعديل منتجات </h3>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.product.update', $data['id']) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="">title</label>
                                <input type="text" class="form-control" name="title"
                                    value="{{ old('title', $data['title']) }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">text_btn</label>
                                <input type="text" class="form-control" name="text_btn"
                                    value="{{ old('text_btn', $data['text_btn']) }}">
                                @error('text_btn')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">price</label>
                                <input type="text" class="form-control" name="price"
                                    value="{{ old('price', $data['price']) }}">
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">quantity</label>
                                <input type="text" class="form-control" name="quantity"
                                    value="{{ old('quantity', $data['quantity']) }}">
                                @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>شعار الشركة</label>
                                <div class="image">
                                    <img width="80" class="custom_img"
                                        src="{{ asset('uploads') . '/' . $data['image1'] }}" alt="لوجو الشركة">
                                    <button type="button" class="btn btn-sm btn-danger" id="update_image">تغير
                                        الصورة</button>
                                    <button type="button" class="btn btn-sm btn-danger" style="display: none;"
                                        id="cancel_update_image"> الغاء</button>


                                </div>
                            </div>
                            <div id="oldimage">

                            </div>


                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> فئة الصنف</label>
                                <select name="categories_id" id="categories_id" class="form-control ">
                                    <option value="">اختر الفئة</option>
                                    @if (@isset($categories_id) && !@empty($categories_id))
                                        @foreach ($categories_id as $info)
                                            <option
                                                {{ old('categories_id', $data['categories_id']) == $info->id ? 'selected' : '' }}
                                                value="{{ $info->id }}"> {{ $info->name }} </option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('categories_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">content</label>
                                <textarea name="content" id="content" class="form-control" cols="30" rows="">{{ old('content', $data['content']) }}</textarea>
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
                                    <option {{ old('avtive', $data['active']) == 1 ? 'selected' : '' }} value="1"> نعم
                                    </option>
                                    <option
                                        {{ old('avtive', $data['active']) == 0 and (old('active') != '' ? 'selected' : '') }}
                                        value="0"> لا
                                    </option>
                                </select>
                                @error('active')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group text-center mt-3">
                                <button type="submit" class="btn btn-primary btn-sm"> اضافة</button>
                                <a href="{{ route('admin.product.index') }}" class="btn btn-sm btn-danger">الغاء</a>

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
