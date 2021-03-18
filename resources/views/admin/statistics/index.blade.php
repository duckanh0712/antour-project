@extends('admin.layouts.main')
@section('title','Quản lý')
@section('content')
    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tour</th>
                <th>số thành viên</th>
                <th>Trạng thái</th>
                <th>thanh toán</th>
                <th>khách hàng</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>

            </tr>
            </thead>
            <tbody>
            @foreach( $data as $key => $item )
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->tour->name }}</td>
                    <td>{{ $item->members  }}</td>
                    @if($item->state == 3)
                        <td>Đã xong</td>
                    @elseif ($item->state == 2 )
                        <td> đã duyệt</td>
                    @else <td>Chờ duyệt</td>
                    @endif
                    <td>{{ (!empty($item->total_price)) ? number_format($item->total_price,0,",",".").' đ' : '0 đ'}}</td>
                    <td>{{ $item->khachhang->name }}</td>
                    <td>{{ $item->tour->start_date }}</td>
                    <td>{{ $item->tour->end_date }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="card-body">
            <hr>
            <strong>Tổng thu:</strong>
            <p class="text-muted">
                {{ number_format($price,0,",",".").' đ'  }}
            </p>
            <hr>
        </div>
    </div>
@endsection
