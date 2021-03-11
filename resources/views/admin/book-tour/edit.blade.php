@extends('admin.layouts.main')
@section('title','Quản lý tour')
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
    <form class="content" action="{{route('admin.tour.update', [ 'id' => $data->id])}}" method="post" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Tên</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $data->name }}">
                        </div>
                        <div class="form-group">
                            <label for="name">Ảnh</label>
                            <img src="{{asset($data->image)}}" alt="" width="10%" class="m-1">
                            <div class="custom-file">

                                <input type="file" class="custom-file-input" name="image" id="image">
                                <label class="custom-file-label" for="image">Chọn ảnh đại diện</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Địa điểm</label>
                            <input type="text" id="address" name="address" class="form-control" value="{{ $data->address }}">
                        </div>
                        <div class="form-group">
                            <label for="name">số thành viên</label>
                            <input type="hidden" id="max_members" name="max_members" class="form-control" value="{{ $data->max_members }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Mô tả</label>
                            <input type="text" id="description" name="description" class="form-control" value="{{ $data->description }}">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Bắt đầu</label>
                            <input type="date" id="start_date" name="start_date" class="form-control" value="{{ $data->start_date }}">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Kết thúc</label>
                            <input type="date" id="end_date" name="end_date" class="form-control" value="{{ $data->start_date }}">
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="col-12">
{{--                <input type="reset" class="btn btn-default pull-right" value="Reset">--}}
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </div>
    </form>
    </section>
@endsection
