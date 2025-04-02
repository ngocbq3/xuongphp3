@extends('layouts/app')
@section('title')
    {{ $product->name }}
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="https://source.unsplash.com/500x500/?clothes" class="img-fluid" alt="Sản phẩm">
            </div>
            <div class="col-md-6">
                <h2>Tên Sản Phẩm</h2>
                <p class="text-danger fw-bold">Giá: 500.000 VND</p>
                <p>Mô tả sản phẩm chi tiết sẽ hiển thị ở đây...</p>

                <div class="color-option mt-3">
                    <strong>Màu sắc:</strong>
                    <input type="radio" id="color-red" name="color" checked>
                    <label for="color-red" style="background-color: red;"></label>
                    <input type="radio" id="color-blue" name="color">
                    <label for="color-blue" style="background-color: blue;"></label>
                    <input type="radio" id="color-green" name="color">
                    <label for="color-green" style="background-color: green;"></label>
                </div>

                <div class="size-option mt-3">
                    <strong>Size:</strong>
                    <input type="radio" id="size-s" name="size" checked>
                    <label for="size-s">S</label>
                    <input type="radio" id="size-m" name="size">
                    <label for="size-m">M</label>
                    <input type="radio" id="size-l" name="size">
                    <label for="size-l">L</label>
                    <input type="radio" id="size-xl" name="size">
                    <label for="size-xl">XL</label>
                </div>

                <button class="btn btn-primary mt-4">Thêm vào giỏ hàng</button>
            </div>
        </div>
    </div>
@endsection
