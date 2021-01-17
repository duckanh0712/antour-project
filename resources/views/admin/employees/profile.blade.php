@extends('admin.layouts.main')
@section('title','Quản lý Antour '.$data->name)
@section('content')
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{asset($data->image)}}" alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{ $data->name }}</h3>

            <p class="text-muted text-center">{{( $data->role == 'employee') ? 'Nhân viên' : 'Quản Lý'}}</p>

            <ul class="table list-group-unbordered mb-3 ">
                <li class="list-group-item ">
                    <b>Ngày Sinh</b> <a class="float-right">{{ $data->birthday }}</a>
                </li>
                <li class="list-group-item ">
                    <b>SĐT</b> <a class="float-right">{{ $data->phone }}</a>
                </li>
                <li class="list-group-item ">
                    <b>email</b> <a class="float-right">{{ $data->email }}</a>
                </li>
            </ul>

            <a href="#" class="btn btn-primary"><b>Sửa</b></a>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
