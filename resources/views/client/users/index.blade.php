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
                        <h3 class="card-title">Quản lý khách hàng</h3>
                        <a class="btn btn-info btn-sm" href="{{ route('user.create') }}">
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
                                email
                            </th>
                            <th>
                                SĐT
                            </th>
                            <th>
                                Tên đăng nhập
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
                                <td class="project_progress">
                                    <span class="">{{ $item->email }}</span>
                                </td>
                                <td class="project_progress">
                                    <span class="">{{ $item->phone }}</span>
                                </td>
                                <td class="project_progress">
                                    <span class="">{{ $item->username }}</span>
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-success btn-sm" href="{{ route('user.show', ['user' => $item->id]) }}">
                                        <i class="fas fa-eye">
                                        </i>
                                    </a>

                                    <a class="btn btn-info btn-sm" href="{{ route('user.edit', ['id'=> $item->id]) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
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

