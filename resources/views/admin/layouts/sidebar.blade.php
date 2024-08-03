<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- Nav Item - Category Management -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategories"
            aria-expanded="true" aria-controls="collapseCategories">
            <i class="fas fa-fw fa-tags"></i> <!-- Updated icon for "Quản lý danh mục" -->
            <span>Quản lý danh mục</span>
        </a>
        <div id="collapseCategories" class="collapse" aria-labelledby="headingCategories"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Danh sách chức năng</h6>
                <a class="collapse-item" href="{{ route('admin.categories.index') }}">Danh sách</a>
                <a class="collapse-item" href="{{ route('admin.categories.create') }}">Tạo mới</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Product Management -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
            aria-expanded="true" aria-controls="collapseProducts">
            <i class="fas fa-fw fa-box"></i> <!-- Updated icon for "Quản lý sản phẩm" -->
            <span>Quản lý sản phẩm</span>
        </a>
        <div id="collapseProducts" class="collapse" aria-labelledby="headingProducts" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Danh sách chức năng</h6>
                <a class="collapse-item" href="{{ route('admin.products.index') }}">Danh sách</a>
                <a class="collapse-item" href="{{ route('admin.products.create') }}">Thêm mới</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - User Management -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
            aria-expanded="true" aria-controls="collapseUsers">
            <i class="fas fa-fw fa-users"></i> <!-- Icon for "Quản lý người dùng" -->
            <span>Quản lý người dùng</span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Danh sách chức năng</h6>
                <a class="collapse-item" href="{{ route('admin.users.index') }}">Danh sách</a>
                <a class="collapse-item" href="{{ route('admin.users.create') }}">Thêm mới</a>
            </div>
        </div>
    </li>
    {{-- //banner --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.banners.index') }}">
            <i class="fas fa-fw fa-image"></i> <!-- Icon for "Quản lý Banner" -->
            <span>Quản lý Banner</span>
        </a>
    </li>    
    {{-- khuyến mãi --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.promotions.index') }}">
            <i class="fas fa-fw fa-tag"></i> <!-- Icon for "Quản lý Khuyến mãi" -->
            <span>Quản lý Khuyến mãi</span>
        </a>
    </li>
    




    {{--    <!-- Divider --> --}}
    {{--    <hr class="sidebar-divider"> --}}

    {{--    <!-- Heading --> --}}
    {{--    <div class="sidebar-heading"> --}}
    {{--        Addons --}}
    {{--    </div> --}}

    {{--    <!-- Nav Item - Pages Collapse Menu --> --}}
    {{--    <li class="nav-item"> --}}
    {{--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" --}}
    {{--           aria-expanded="true" aria-controls="collapsePages"> --}}
    {{--            <i class="fas fa-fw fa-folder"></i> --}}
    {{--            <span>Pages</span> --}}
    {{--        </a> --}}
    {{--        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar"> --}}
    {{--            <div class="bg-white py-2 collapse-inner rounded"> --}}
    {{--                <h6 class="collapse-header">Login Screens:</h6> --}}
    {{--                <a class="collapse-item" href="login.html">Login</a> --}}
    {{--                <a class="collapse-item" href="register.html">Register</a> --}}
    {{--                <a class="collapse-item" href="forgot-password.html">Forgot Password</a> --}}
    {{--                <div class="collapse-divider"></div> --}}
    {{--                <h6 class="collapse-header">Other Pages:</h6> --}}
    {{--                <a class="collapse-item" href="404.html">404 Page</a> --}}
    {{--                <a class="collapse-item" href="blank.html">Blank Page</a> --}}
    {{--            </div> --}}
    {{--        </div> --}}
    {{--    </li> --}}

    {{--    <!-- Nav Item - Charts --> --}}
    {{--    <li class="nav-item"> --}}
    {{--        <a class="nav-link" href="charts.html"> --}}
    {{--            <i class="fas fa-fw fa-chart-area"></i> --}}
    {{--            <span>Charts</span></a> --}}
    {{--    </li> --}}

    {{--    <!-- Nav Item - Tables --> --}}
    {{--    <li class="nav-item"> --}}
    {{--        <a class="nav-link" href="tables.html"> --}}
    {{--            <i class="fas fa-fw fa-table"></i> --}}
    {{--            <span>Tables</span></a> --}}
    {{--    </li> --}}

    {{--    <!-- Divider --> --}}
    {{--    <hr class="sidebar-divider d-none d-md-block"> --}}

    {{--    <!-- Sidebar Toggler (Sidebar) --> --}}
    {{--    <div class="text-center d-none d-md-inline"> --}}
    {{--        <button class="rounded-circle border-0" id="sidebarToggle"></button> --}}
    {{--    </div> --}}

    {{--    <!-- Sidebar Message --> --}}
    {{--    <div class="sidebar-card d-none d-lg-flex"> --}}
    {{--        <img class="sidebar-card-illustration mb-2" src="{{asset('theme/admin/img/undraw_rocket.svg')}}" alt="..."> --}}
    {{--        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more! --}}
    {{--        </p> --}}
    {{--        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a> --}}
    {{--    </div> --}}

</ul>
