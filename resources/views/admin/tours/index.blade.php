@extends('admin.layouts.main')
@section('title','Quản lý phòng')
@section('content')
    <div class="card">
        <div class="card-header">
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
            <h3 class="card-title">Danh sách nhân viên</h3>

            <div class="card-tools">
                <a href="{{ route('admin.tour.create') }}" class="btn btn-primary fas">Thêm mới</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên </th>
                    <th>Ảnh</th>
                    <th>địa chỉ</th>
                    <th>Mô tả</th>
                    <th>thành viên</th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày kết thúc</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $data as $key => $item)
                    <tr id="{{'tr-'.$item->id}}">

                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar" src="{{asset($item->image)}}" style="width: 150px">
                                </li>
                            </ul>
                        </td>

                        <td>{{ $item->address }}</td>
                        <td>{{ $item->description  }}</td>
                        <td>{{ $item->max_members  }}</td>
                        <td>{{ $item->start_date  }}</td>
                        <td>{{ $item->end_date  }}</td>
                        <td>
                            <a href="{{ route('admin.tour.edit', ['id'=> $item->id]) }}" class="btn btn-primary fas fa-edit"> Sửa</a>
{{--                            <a href="javascript:void(0)" onclick="destroy( {{$item->id}},'tour')" class="btn btn-danger "> Xóa</a>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection