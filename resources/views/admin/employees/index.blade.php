@extends('admin.layouts.main')
@section('title','Quản lý Antour')
@section('content')
    <div class="card card-primary">
        <!-- /.card-header -->

        <!-- form start -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Quản lý nhân viên</h3>
                        <a class="btn btn-info btn-sm" href="{{ route('admin.employee.create') }}">
                            <i class="nav-icon ion-person-add">
                            </i>
                            Thêm
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 1%">
                                STT
                            </th>
                            <th style="width: 20%">
                                Họ và Tên
                            </th>
                            <th style="width: 30%">
                                Ảnh
                            </th>
                            <th>
                                Quyền
                            </th>
                            <th style="width: 8%" class="text-center">
                                Status
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key => $item)
                            <tr class="item-{{ $item->id }}"> <!-- Thêm Class Cho Dòng -->
                                <td>{{ ($key + 1) }}</td>
                            <td>
                                <a>
                                    {{$item->name}}
                                </a>
                                <br/>
                                <small>
                                    {{'Đã tạo: '.$item->created_at}}
                                </small>
                            </td>
                            <td>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <img alt="Avatar" class="table-avatar" src="{{asset($item->image)}}">
                                    </li>
                                </ul>
                            </td>
                            <td class="project_progress">
                                <span class="">{{($item->role == 'manager' ? 'Quản Lý' : 'Nhân viên')}}</span>
                            </td>
                            <td class="project-state">
                                <span class="badge">{{($item->state == true) ? 'Hoạt động' : 'Không hoạt động'}}</span>
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-success fas fa-eye" href="{{ route('admin.employee.show', ['employee' => $item->id]) }}">
                                </a>

                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $data->links() }}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection

