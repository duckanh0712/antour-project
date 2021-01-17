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
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Họ và Tên</label>
                            <input type="text" id="inputName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Email</label>
                            <input type="email" id="inputName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">SĐT</label>
                            <input type="number" id="inputName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Ngày sinh</label>
                            <input type="date" id="inputName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Giới tính</label>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                                <label for="customRadio1" class="custom-control-label">Nam</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio" checked="">
                                <label for="customRadio2" class="custom-control-label">Nữ</label>
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
                            <label for="inputEstimatedBudget">Tên đăng nhập</label>
                            <input type="text" id="inputEstimatedBudget" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputSpentBudget">Mật khẩu</label>
                            <input type="password" id="inputSpentBudget" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Quyền</label>
                            <select id="inputStatus" class="form-control custom-select">
                                <option selected disabled>Chọn quyền</option>
                                <option>Nhân Viên</option>
                                <option>Quản Lý</option>
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
                <a href="#" class="btn btn-secondary">Hủy</a>
                <a href="#" class="btn btn-success">Lưu</a>
            </div>
        </div>
    </section>
@endsection
