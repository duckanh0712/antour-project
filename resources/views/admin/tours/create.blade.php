@extends('admin.layouts.main')
@section('title','Quản lý tour')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm Tour</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Quản Lý Antour</a></li>
                        <li class="breadcrumb-item"><a href="#">Quản lý tour</a></li>
                        <li class="breadcrumb-item active">Thêm tour</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible col-6">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> Lỗi!</h4>
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <!-- Main content -->
    <form class="content" action="{{route('admin.tour.store')}}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Tên</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Ảnh</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="image">
                                <label class="custom-file-label" for="image">Chọn ảnh đại diện</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Địa điểm</label>
                            <input type="text" id="address" name="address" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Tổng thành viên</label>
                            <input type="number" id="max_members" name="max_members" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">Mô tả</label>
                            <textarea type="text" id="description" name="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="phone">Giá</label>
                            <input type="number" id="price" name="price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Bắt đầu</label>
                            <input type="date" id="start_date" name="start_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Kết thúc</label>
                            <input type="date" id="end_date" name="end_date" class="form-control">
                        </div>
                <!-- /.card -->
            </div>
                </div>
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
