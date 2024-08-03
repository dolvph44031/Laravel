<header>
    <div class="container">
        <div class="py-2">
            <div class="row ">
                <div class="col-md-2 ">
                    <a href="{{ route('home') }}" class="text-decoration-none">
                        <h3 class="text-info">COSMA</h3>
                    </a>
                </div>
                <div class="col-md-5">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Tìm kiếm từ khóa"
                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <span class="input-group-text" id="basic-addon2">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md">
                            <div class="row">
                                <div class="col-3 ">
                                    <div class="fs-2 text-danger ">
                                        <i class="fa-solid fa-phone-volume"></i>
                                    </div>
                                </div>
                                <div class="col-9">
                                    Tư vấn hỗ trợ<br>
                                    <strong class="text-danger ">0976830642</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="row">
                                <div class="col-3 ">
                                    <div class="fs-2 ">
                                        <i class="fa-solid fa-circle-user"></i>
                                    </div>
                                </div>
                                {{-- <div class="col-9">
                                    Xin chào!<br>
                                    <a href="login.html" class="text-info text-decoration-none ">Đăng Nhập</a>
                                    <!-- <strong class="text-info">Đăng Nhập</strong> -->
                                </div> --}}
                                <div class="col-9">
                                    @guest
                                        Xin chào!<br>
                                        <a href="{{ route('login') }}" class="text-info text-decoration-none">Đăng Nhập</a>
                                    @else
                                        Xin chào, {{ auth()->user()->name }}!<br>
                                        <a href="{{ route('logout') }}" class="text-info text-decoration-none" 
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng Xuất</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    @endguest
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div>
                        <a href="{{ route('cart.list') }}" class="btn position-relative pt-2 pe-4" id="cartButton">
                            <i class="fa-solid fa-cart-shopping fs-2"></i>
                            <span class="badge bg-danger rounded-pill position-absolute top-0 end-0" id="cartBadge">0</span>
                        </a>
                    </div>
                
                    <script>
                        $(document).ready(function() {
                            $('#addToCartForm').on('submit', function(event) {
                                event.preventDefault();
                                $.ajax({
                                    url: $(this).attr('action'),
                                    method: 'POST',
                                    data: $(this).serialize(),
                                    success: function(response) {
                                        if (response.success) {
                                            $('#cartBadge').text(response.totalItems);
                                        }
                                    }
                                });
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="container-fluid bg-light p-2 text-center ">Free ship toàn quốc</div> -->
</header>
    <div>
        <nav class="navbar navbar-expand-lg bg-info  ">
            <div class="container-fluid">
                <a class="navbar-brand d-none " href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ">
                        <li class="nav-item ">
                            <a class="nav-link text-white active  " aria-current="page" href="#">Trang Chủ</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Danh Mục
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach($categories as $category)
                                    <li>
                                        <a class="dropdown-item" href="">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>                      
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Giới Thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Tuyển Dụng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Tin Tức</a>
                        </li>
                        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                            <!-- Other menu items -->
                            
                            @if (auth()->check() && auth()->user()->type === 'admin')
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">
                                        <i class="fas fa-fw fa-tachometer-alt"></i>
                                        <span>Trang Admin</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                        
                        {{-- <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-fw fa-tachometer-alt"></i>
                                <span>Trang Admin</span>
                            </a>
                        </li> --}}
                        
                    </ul>
                </div>
            </div>
        </nav>
    </div>
