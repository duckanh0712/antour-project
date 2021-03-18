@extends('admin.layouts.main')
@section('title','Quản lý Antour')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Đổi mật khẩu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Quản Lý Antour</a></li>
                        <li class="breadcrumb-item"><a href="#">Quản lý nhân viên</a></li>
                        <li class="breadcrumb-item active">Đổi mật khẩu</li>
                    </ol>
                </div>
            </div>
           <div class="col-6">
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
           </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form class="content" action="{{route('admin.change.password')}}" method="post" >
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tài khoản</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="username">Mật khẩu hiện tại </label>
                            <input type="password" id="current_password" name="current_password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu mới</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Nhập lại mật khẩu</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Tạo</button>
            </div>
        </div>
    </form>
    </section>
@endsection
