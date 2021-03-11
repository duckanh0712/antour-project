@extends('admin.layouts.main')
@section('title','Quản lý tour')
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
            <h3 class="card-title">Danh sách tour</h3>

{{--            <div class="card-tools">--}}
{{--                <a href="{{ route('admin.tour.create') }}" class="btn btn-primary fas">Thêm mới</a>--}}
{{--            </div>--}}
            <h3 class="card-title">Danh sách book-tour</h3>

            <div class="card-tools">
                <a href="{{ route('admin.book-tour.create') }}" class="btn btn-primary fas">Thêm mới</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Khách hàng</th>
                    <th>Tour</th>
                    <th>Ảnh</th>
                    <th>Thành viên</th>
                    <th>Chi phí</th>
                    <th>Trạng thái</th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    <th>Nhân viên</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $data as $key => $item)
                    <tr id="{{'tr-'.$item->id}}">

                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->khachhang->name }}</td>
                        <td>{{ $item->tour->name }}</td>
                        <td>
                            <img alt="Avatar" class="table-avatar" src="{{asset($item->tour->image)}}" style="width: 150px">
                        </td>
                        <td>{{ $item->members }}</td>
                        <td>{{ number_format($item->total_price,0,",",".").' đ' }}</td>
                        <td>{{ $item->state == 0 ? 'chờ duyệt' : 'đã duyệt' }}</td>
                        <td>{{ date('d-m-Y', strtotime($item->tour->start_date))  }}</td>
                        <td>{{ date('d-m-Y', strtotime($item->tour->end_date))  }}</td>
                        <td>{{ !empty($item->employee_id) ? $item->employee->name : ''  }}</td>
                        <td>
                            @if(!$item->employee_id)
                                <a href="javascript:void(0)" onclick="confirmBookTour({{$item->id}})" class="btn btn-primary"> Duyệt</a>
                            @endif
                            @if( $item->state == 1)
                                <a href="{{route('book-tour.pay.form',[ 'id' => $item->id])}}"   class="btn btn-primary"> Thanh toán</a>
                            @endif
                            {{--                            <a href="javascript:void(0)" onclick="destroy( {{$item->id}},'room')" class="btn btn-danger "> Xóa</a>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

