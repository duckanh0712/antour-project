<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="/backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Antour</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{(!empty(Auth::user()->image)) ? asset(Auth::user()->image) : ''}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('employee.detail')}}" class="d-block">{{ (!empty(Auth::user()->name)) ? Auth::user()->name : 'member'}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.employee.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Quản lý nhân viên
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.user.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                           Quản lý khách hàng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.tour.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Quản lý tour
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.book-tour.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-inbox"></i>
                        <p>
                            Quản lý đặt tour
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.book-tour.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-barcode"></i>
                        <p>
                            Thống kê
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
