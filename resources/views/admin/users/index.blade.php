@extends('admin.include.master')

@section('title','Dashboard')
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
            <h3 class="card-title card_title_center">بيانات المستخدمين </h3>
        </div>

        <div class="card-body">
            <div class="row">
                <div id="ajax_responce_serarchDiv" class="col-md-12">

                    @if (@isset($data) && !@empty($data) && count($data) > 0)
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="bg-dark">
                                <th>id</th>
                                <th>الاسم </th>
                                <th> الإيميل </th>
                                <th> الهاتف </th>
                                <th>الصورة</th>
                                <th>العنوان</th>
                                <th>المستخدم</th>
                                <th> التفعيل</th>
                                <th></th>
                            </thead>
                            @foreach ($data as $info )
                            <tbody>

                                    <td>{{ $info->id }}</td>
                                    <td>{{ $info->name }}</td>
                                    <td>{{ $info->email }}</td>
                                    <td>{{ $info->phone }}</td>
                                    <td>{{ $info->image }}</td>
                                    <td>{{ $info->address }}</td>
                                    <td @if ($info->type == 'admin') class="bg-success" @else class="bg-danger" @endif>
                                        @if ($info->type == 'admin')
                                            admin
                                        @else
                                            user
                                        @endif
                                    </td>
                                    <td @if ($info->active == 0) class="bg-success" @else class="bg-danger" @endif>
                                        @if ($info->active == 0)
                                            مفعل
                                        @else
                                            معطل
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.users.edit', $info->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('admin.users.delete',$info->id) }}" class="btn btn-danger btn-sm">delete</a>
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
