@extends('admin.layouts.main')
@section('title','Quản lý Antour '.$data->name)
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
                <img class="profile-user-img img-fluid img-circle" src="{{asset($data->image)}}" alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{ $data->name }}</h3>
            @if( $data->role == 'guest')
                    <p class="text-muted text-center">Khách hàng</p>
                @else
            <p class="text-muted text-center">{{( $data->role == 'employee') ? 'Nhân viên' : 'Quản Lý'}}</p>
                @endif
            <ul class="list-group ">
                <li class="list-group-item ">
                    <b>Ngày Sinh</b> <b class="float-right">{{ $data->birthday }}</b>
                </li>
                <li class="list-group-item ">
                    <b>SĐT</b> <b class="float-right">{{ $data->phone }}</b>
                </li>
                <li class="list-group-item ">
                    <b>email</b> <b class="float-right">{{ $data->email }}</b>
                </li>
                <li class="list-group-item ">
                    <b>username</b> <b class="float-right">{{ $data->username }}</b>
                </li>
                <li class="list-group-item ">
                    <b>Giới tính</b> <b class="float-right">{{ $data->sex }}</b>
                </li>
                <li class="list-group-item ">
                    <b>Trạng thái</b> <b class="float-right">{{ ($data->state == true) ? 'Hoạt động' : 'Không hoạt động'}}</b>

                </li>
            </ul>
            <form action="{{route('admin.employee.change',['employee' => $data->id])}}" method="post">
                @csrf
                <input type="hidden" name="state" id="state" value="{{$data->state}}">
                <button class="btn btn-primary" type="submit">Thay đổi trạn thái</button>
            </form>

        </div>
        <!-- /.card-body -->
    </div>
@endsection

