@extends('admin.layouts.main')
@section('title','Quản lý tour')
@section('content')
    <div class="card">
        <div class="card-header">
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Lỗi!</h4>
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
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
                <div class="d-flex justify-content-between ">
                    <h3 class="card-title">Danh sách tour</h3>
{{--                    <form class="form-inline" action="{{route('search.tours')}}" method="get">--}}
{{--                        <div class="input-group input-group-sm">--}}
{{--                            <input class="form-control" type="search" name="p" id="p" placeholder="Tìm kiếm" aria-label="Search">--}}
{{--                            <div class="input-group-append">--}}
{{--                                <button class="btn btn-navbar" type="submit">--}}
{{--                                    <i class="fas fa-search"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
                    <div class="card-tools">
                        <a href="{{ route('admin.tour.create') }}" class="btn btn-primary fas">Thêm mới</a>
                    </div>
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
                    <th>Giá</th>
                    <th>Thành viên đăng ký</th>
{{--                    <th>Mô tả</th>--}}

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
                            <img alt="Avatar" class="table-avatar" src="{{asset($item->image)}}" style="width: 150px">
                        </td>
                        <td>{{ number_format($item->price,0,",",".").' đ' }}</td>
                        <td>{{ $item->members.'/'.$item->max_members }}</td>
{{--                        <td>{{ $item->description  }}</td>--}}

                        <td>{{ date('d-m-Y', strtotime($item->start_date))  }}</td>
                        <td>{{ date('d-m-Y', strtotime($item->end_date))  }}</td>
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
