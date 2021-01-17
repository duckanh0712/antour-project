@extends('admin.layouts.main')
@section('title','Quản lý Antour')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm nhân viên</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Quản Lý Antour</a></li>
                        <li class="breadcrumb-item"><a href="#">Quản lý nhân viên</a></li>
                        <li class="breadcrumb-item active">Thêm nhân viên</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form class="content" action="{{route('admin.employee.store')}}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Họ và Tên</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">SĐT</label>
                            <input type="number" id="phone" name="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Ngày sinh</label>
                            <input type="date" id="inputName" name="birthday" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Giới tính</label>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="customRadio1" value="NAM" name="sex">
                                <label for="customRadio1" class="custom-control-label">Nam</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="customRadio2" value="NỮ" name="sex" checked="">
                                <label for="customRadio2" class="custom-control-label">Nữ</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Ảnh</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="image">
                                <label class="custom-file-label" for="image">Chọn ảnh đại diện</label>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tài khoản</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="username">Tên đăng nhập</label>
                            <input type="text" id="username" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="role">Quyền</label>
                            <select id="role" name="role" class="form-control custom-select">
                                <option selected disabled>Chọn quyền</option>
                                <option value="employee">Nhân Viên</option>
                                <option value="manager">Quản Lý</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <input type="reset" class="btn btn-default pull-right" value="Reset">
                <button type="submit" class="btn btn-primary">Tạo</button>
            </div>
        </div>
    </form>
    </section>
@endsection
