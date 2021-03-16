<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-commerce</title>

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
    <!-- Navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="m-2">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        @if(!empty(Auth::user()))
                            <p >Khách hàng: <a href="/"> {{ Auth::user()->name  }}</a></p>
                        @else
                            <p>Bạn chưa <a href="{{ route('admin.login') }}">đăng nhập</a></p>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

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
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="col-12 mt-4">
                                <img src="{{ asset($tour->image) }}" class="product-image" alt="Product Image">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h3 class="my-3">{{ $tour->name }}</h3>
                            <hr>
                            <p>Địa chỉ: {{$tour->address}}</p>
                            <hr>
                            <p>Thời gian :  {{date('d-m-Y', strtotime($tour->start_date)).' --------- '.date('d-m-Y', strtotime($tour->end_date))}}</p>
                            <hr>
                            <p>Mô tả: {{$tour->description}}</p>
                            <hr>
                            <p>Thành viên: {{ $tour->members.'/'.$tour->max_members }}</p>
                            <hr>
                            <p> Chi phí cho 1 thành viên: {{ number_format($tour->price,0,",",".").' đ'}}</p>
                            <div class="mt-4">
                                <button class="btn btn-primary btn-lg btn-flat" onclick="booktour({{$tour->id}})">

                                   Đăng ký
                                </button>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('client.components.book_tour')
<!-- jQuery -->
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

