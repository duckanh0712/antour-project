<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng ký phòng trực tuyến </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/backend/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/backend/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <section class="content">

        <!-- Default box -->
        <div class="d-flex justify-content-center">

            <h2>Hệ thống phòng Anhotel</h2>
        </div>
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
        <div class="d-flex justify-content-between m-5">

            @if((Auth::check()))
                <div class="info">
                    <div class="d-flex justify-content-start "> <p class="mr-1">Khách hàng: </p><a href="{{route('client.profile')}}" class="d-block">{{ Auth::user()->name }}</a></div>
                </div>
                <a class="" href="{{ route('logout') }}" >Đăng xuất</a>
            @else
                <p>Bạn chưa <a href="{{ route('admin.login') }}">đăng nhập</a></p>
            @endif


        </div>
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row d-flex align-items-stretch">
                    @if(!empty($data))
                        @foreach($data as $key => $room)
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                <div class="card bg-light">
                                    <div class="card-header text-muted border-bottom-0">

                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="lead"><b>{{ 'Phòng: '.$room->name }}</b></h2>
                                                <p class="text-muted text-sm"><b>Thông tin: </b> {{ $room->description }} </p>
                                                <p class="text-muted text-sm"><b>Giá: </b> {{number_format($room->price,0,",",".").'đ '}} </p>
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Tình trạng: tốt</li>
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Loại phòng: {{ $room->category }}</li>
                                                </ul>
                                            </div>
                                            <div class="col-5 text-center">
                                                <img src="/backend/dist/img/mau-tam-trang tri-giuong-khach-san-dep-nhat-19.jpg" alt="user-avatar" class="img-circle img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <a href="javascript:void(0)" class="btn btn-sm btn-primary" onclick="roomBook({{ $room->id }})">
                                                <i class=""></i>Đăng ký
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @endif
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <nav aria-label="Contacts Page Navigation">
                    <ul class="pagination justify-content-center m-0">

                    </ul>
                </nav>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

</div>
<!-- jQuery -->
{{--@include('components.roombook')--}}
<script src="/backend/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/backend/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/backend/dist/js/demo.js"></script>
<script src="/js/my_javascript.js"></script>

</body>
</html>

