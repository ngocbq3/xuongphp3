@extends('layouts/app')

@section('title')
    Shop bán hàng thời trang
@endsection

@section('content')
    <div class="container mt-5" id="products">
        <h2 class="text-center mb-4">Sản Phẩm Nổi Bật</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="https://source.unsplash.com/400x300/?clothes" class="card-img-top" alt="Sản phẩm">
                    <div class="card-body">
                        <h5 class="card-title">Sản Phẩm 1</h5>
                        <p class="card-text">Mô tả sản phẩm ngắn gọn.</p>
                        <a href="#" class="btn btn-primary">Xem Thêm</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://source.unsplash.com/400x300/?fashion" class="card-img-top" alt="Sản phẩm">
                    <div class="card-body">
                        <h5 class="card-title">Sản Phẩm 2</h5>
                        <p class="card-text">Mô tả sản phẩm ngắn gọn.</p>
                        <a href="#" class="btn btn-primary">Xem Thêm</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://source.unsplash.com/400x300/?shoes" class="card-img-top" alt="Sản phẩm">
                    <div class="card-body">
                        <h5 class="card-title">Sản Phẩm 3</h5>
                        <p class="card-text">Mô tả sản phẩm ngắn gọn.</p>
                        <a href="#" class="btn btn-primary">Xem Thêm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
