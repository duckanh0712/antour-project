@extends('admin.layouts.main')
@section('title','Thêm mới khách hàng');
@section('content')
    <div class="card card-info col-6" >
        <div class="card-header">
            <h3 class="card-title">Thêm mới khách hàng </h3>
        </div>
        <div class="">
            <form action="{{route('admin.user.store')}}" method="post">
                @csrf
                <div class="input-group mb-3 mt-3">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Họ và Tên">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Tên đăng nhập">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="number" class="form-control" name="phone" id="phone" placeholder="SĐT">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="date" class="form-control" name="birthday" id="birthday" >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-calendar-alt"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="role" id="role" value="GUEST">
                <div class="row">
                    <div class="col-8">
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="customRadio1" value="Nam" name="sex">
                            <label for="customRadio1" class="custom-control-label">Nam</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="customRadio2" value="Nữ" name="sex" checked="">
                            <label for="customRadio2" class="custom-control-label">Nữ</label>
                        </div>

                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                    </div>
                </div>
            </form>
        </div>

        </div>
        <!-- /.card-body -->
    </div>
@endsection

