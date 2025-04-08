<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('') }}css/style.css">

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Shop Thời Trang</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Trang Chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#products">Sản Phẩm</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Giới Thiệu</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Liên Hệ</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Banner -->
    <div class="banner">
        <h1>Chào Mừng Đến Với Shop Thời Trang</h1>
    </div>

    @yield('content')
    <!-- Sản phẩm nổi bật -->


    <!-- Giới thiệu -->
    <div class="container mt-5" id="about">
        <h2 class="text-center">Về Chúng Tôi</h2>
        <p class="text-center">Chúng tôi chuyên cung cấp các sản phẩm thời trang chất lượng cao với giá cả hợp lý.</p>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3 mt-5">
        <p>&copy; 2025 Shop Thời Trang. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
