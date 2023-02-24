@extends('admin.include.master')

@section('title', 'Dashboard')
@section('titlecontent')

    Product
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
                <h3 class="card-title card_title_center">بيانات المنتجات </h3>
                <a href="{{ route('admin.product.create') }}" class="btn btn-sm btn-success"> اضافة منتج جديد</a>


            </div>

            <div class="card-body">
                <div class="row">
                    <div id="ajax_responce_serarchDiv" class="col-md-12">

                        @if (@isset($data) && !@empty($data) && count($data) > 0)
                            <table id="example2" class="table table-bordered table-hover ">
                                <thead class="bg-dark">
                                    <th>id</th>
                                    <th>Title </th>
                                    <th>categories_id </th>
                                    <th> Content </th>
                                    <th> image1 </th>
                                    <th> Price </th>
                                    <th> Sale_price </th>
                                    <th>Quantity</th>
                                    <th>text_btn</th>
                                    <th>updated_by</th>
                                    <th> التفعيل</th>
                                    <th></th>
                                </thead>
                                @foreach ($data as $info)
                                    <tbody>

                                        <td>{{ $info->id }}</td>
                                        <td>{{ $info->title }}</td>
                                        <td>{{ $info->categories_id_name }}</td>
                                        <td>{{ $info->content }}</td>
                                        <td>
                                            <div class="image">
                                                <img width="80" src="{{ asset('uploads/' . $info->image1) }}"
                                                    alt="">

                                            </div>
                                        </td>
                                        <td>{{ $info->price }}</td>
                                        <td>{{ $info->sale_price }}</td>
                                        <td>{{ $info->quantity }}</td>
                                        <td>{{ $info->text_btn }}</td>
                                        <td>

                                            @php
                                                $dt = new DateTime($info->created_at);
                                                $date = $dt->format('Y-m-d');
                                                $time = $dt->format('h:i');
                                                $newDateTime = date('A', strtotime($time));
                                                $newDateTimeType = $newDateTime == 'AM' ? 'صباحا ' : 'مساء';
                                            @endphp
                                            {{ $date }} <br>
                                            {{ $time }}
                                            {{ $newDateTimeType }} <br>
                                            بواسطة
                                            {{ $info->added_by_admin }}


                                        </td>
                                        <td
                                            @if ($info->active == 1) class="bg-success" @else class="bg-danger" @endif>
                                            @if ($info->active == 1)
                                                مفعل
                                            @else
                                                معطل
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.product.edit', $info->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                <form class="d-inline" action="{{ route('admin.product.delete', $info->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button onclick="return confirm('Are you sure?!')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                </form>
                                        </td>

                                    </tbody>
                                @endforeach
                            </table>
                        @else
                            <div class="alert alert-danger">
                                عفوا لاتوجد بيانات لعرضها !!
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>



        </div>
    </section>
@stop
