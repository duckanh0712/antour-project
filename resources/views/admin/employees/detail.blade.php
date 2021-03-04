@extends('admin.layouts.main')
@section('title','Quản lý Antour '.Auth::user()->name)
@section('content')
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            @if ( Session::has('error') )
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Thông báo</h5>
                    {{ Session::get('error') }}
                </div>
            @elseif( Session::has('success') )
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Thông báo </h5>
                    {{ Session::get('success') }}
                </div>
            @endif


            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{asset(Auth::user()->image)}}" alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

            <p class="text-muted text-center">{{( Auth::user()->role == 'employee') ? 'Nhân viên' : 'Quản Lý'}}</p>

            <ul class="list-group ">
                <li class="list-group-item ">
                    <b>Ngày Sinh</b> <b class="float-right">{{ Auth::user()->birthday }}</b>
                </li>
                <li class="list-group-item ">
                    <b>SĐT</b> <b class="float-right">{{ Auth::user()->phone }}</b>
                </li>
                <li class="list-group-item ">
                    <b>email</b> <b class="float-right">{{ Auth::user()->email }}</b>
                </li>
                <li class="list-group-item ">
                    <b>username</b> <b class="float-right">{{ Auth::user()->username }}</b>
                </li>
                <li class="list-group-item ">
                    <b>Giới tính</b> <b class="float-right">{{ Auth::user()->sex }}</b>
                </li>
                <li class="list-group-item ">
                    <b>Trạng thái</b> <b class="float-right">{{ (Auth::user()->state == true) ? 'Hoạt động' : 'Không hoạt động'}}</b>
                </li>
            </ul>
                <a href="{{route('admin.employee.edit', [ 'id' => Auth::user()->id ])}}" class="btn btn-primary mt-3" type="submit">Cập nhật thông tin</a>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

