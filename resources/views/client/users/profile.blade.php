
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anhotel | {{ Auth::user()->name }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/backend/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/backend/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="">
    <!-- Navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="m-2">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Trang cá nhân</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>

                        </ol>
                    </div>
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
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">

                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="/backend/dist/img/user4-128x128.jpg" alt="User profile picture">
                                </div>
                                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Thông tin</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong>Tên đăng nhập</strong>

                                <p class="text-muted">
                                    {{ Auth::user()->username }}
                                    </p>

                                <hr>

                                <strong>SDT</strong>

                                <p class="text-muted">{{ '0'.Auth::user()->phone }}</p>

                                <hr>
                                <strong>Email</strong>

                                <p class="text-muted">{{ Auth::user()->email }}</p>

                                <hr>
                                <strong>Ngày sinh</strong>
                                <p class="text-muted">{{ Auth::user()->birthday }}</p>

                                <hr>
                                <strong>Giới tính</strong>
                                <p class="text-muted">{{ Auth::user()->sex }}</p>

                                <hr>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">

                        <!-- /.card -->
                        <div class="">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Lịch sử đặt tour</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Cập nhật thông tin</a></li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane" id="activity">
                                            <form class="form-horizontal" action="" method="post">
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Tên</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">SĐT</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ '0'.Auth::user()->phone }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputSkills" class="col-sm-2 col-form-label">Ngày sinh</label>
                                                    <div class="col-sm-10">
                                                        <input type="date" class="form-control" id="birthday" name="birthday" value="{{ (!empty(Auth::user()->birthday)) ? Auth::user()->birthday : '' }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label" >Giới tính</label>
                                                    <div class="custom-control custom-radio">
                                                        <input class="custom-control-input" type="radio" id="customRadio1" value="Nam" required="" name="sex" checked="">
                                                        <label for="customRadio1" class="custom-control-label">Nam</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input class="custom-control-input" type="radio" id="customRadio2"value="Nữ" required="" name="sex">
                                                        <label for="customRadio2" class="custom-control-label">Nữ</label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-primary">Lưu</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                        <div class="tab-pane active" id="settings">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Lịch sử đặt phòng</h3>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body table-responsive p-0">
                                                        <table class="table table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th>STT</th>
                                                                <th>Phòng</th>
                                                                <th>Giá phòng</th>
                                                                <th>Trạng thái</th>
                                                                <th>thanh toán</th>
                                                                <th>Loại phòng</th>
                                                                <th>Ngày bắt đầu</th>
                                                                <th>Ngày kết thúc</th>
                                                                <th>Thu ngân</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
{{--                                                            @foreach( $room_books as $key => $item )--}}
{{--                                                                <tr>--}}
{{--                                                                    <td>{{ $key + 1 }}</td>--}}
{{--                                                                    <td>{{ $item->room->name }}</td>--}}
{{--                                                                    <td>{{ number_format($item->room->price,0,",",".").' đ' }}</td>--}}
{{--                                                                    @if($item->state == 3)--}}
{{--                                                                        <td>Đã xong</td>--}}
{{--                                                                    @elseif ($item->state == 2 )--}}
{{--                                                                        <td> đã duyệt</td>--}}
{{--                                                                    @else <td>Chờ duyệt</td>--}}
{{--                                                                    @endif--}}
{{--                                                                    <td>{{ (!empty($item->total_price)) ? number_format($item->total_price,0,",",".").' đ' : '0 đ'}}</td>--}}
{{--                                                                    <td>{{ $item->room->category }}</td>--}}
{{--                                                                    <td>{{ $item->start_date }}</td>--}}
{{--                                                                    <td>{{ (!empty($item->end_date)) ? $item->end_date : '' }}</td>--}}
{{--                                                                    <td>{{ (!empty($item->employee->name)) ? $item->employee->name : '' }}</td>--}}
{{--                                                                </tr>--}}
{{--                                                            @endforeach--}}
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                    </div>
                    <!-- /.col -->

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/backend/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/backend/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/backend/dist/js/demo.js"></script>
</body>
</html>
