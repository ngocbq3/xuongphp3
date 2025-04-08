@extends('layouts/app')
@section('title')
    {{ $product->name }}
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ Storage::URL($product->image) }}" class="img-fluid" alt="{{ $product->name }}">
            </div>
            <div class="col-md-6">
                <!--ID sản phẩm-->
                <input type="hidden" id="product-id" value="{{ $product->id }}">
                <h2>{{ $product->name }}</h2>
                <p class="text-danger fw-bold price" id="product-price">Giá: {{ $product->lowest_price }} $</p>
                <div class="color-option mt-3">
                    <strong>Màu sắc:</strong>
                    @foreach ($product->variants->unique('color') as $variant)
                        <input type="radio" id="color-{{ $variant->color->id }}" name="color"
                            value="{{ $variant->color->id }}" class="color">
                        <label for="color-{{ $variant->color->id }}"
                            style="background-color: {{ $variant->color->code }};"></label>
                    @endforeach
                </div>

                <div class="size-option mt-3">
                    <strong>Size:</strong>
                    @foreach ($product->variants->unique('size') as $variant)
                        <input type="radio" id="size-{{ $variant->size->id }}" name="size"
                            value="{{ $variant->size->id }}" class="size">
                        <label for="size-{{ $variant->size->id }}">{{ $variant->size->name }}</label>
                    @endforeach

                </div>
                <div class="mt-3"><strong>Số lượng: <span id="stock"></span></strong></div>
                <div class="mt-3"><strong>Chất liệu</strong></div>
                <p class="mt-3">{{ $product->metarial }}</p>

                <div><strong>Hướng dẫn sử dụng</strong></div>
                <p class="mt-3">{{ $product->instruct }}</p>

                <div><strong>Mô tả</strong></div>
                <p class="m">{{ $product->description }}</p>

                <button class="btn btn-primary mt-4">Thêm vào giỏ hàng</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // ID sản phẩm
            let productId = document.getElementById('product-id').value; 
            // Các biến chứa các phần tử class size và color
            let sizeInputs = document.querySelectorAll(".size");
            let colorInputs = document.querySelectorAll(".color");
            // Các biến chứa các phần tử id price và stock
            let priceElement = document.getElementById("product-price");
            let stockElement = document.getElementById("stock");
            

            function updatePrice() {
                let selectedColor = document.querySelector(".color:checked").value;
                let selectedSize = document.querySelector(".size:checked").value;
                
                fetch(`/get-variant-price?product_id=${productId}&color=${selectedColor}&size=${selectedSize}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        if (data.price) {
                            priceElement.textContent = data.price.toLocaleString("vi-VN") + " ₫";
                            stockElement.textContent = data.stock;
                        } else {
                            priceElement.textContent = "Liên hệ";
                            stockElement.textContent = "Hết hàng";
                        }
                    })
                    .catch(error => console.error("Lỗi khi lấy giá:", error));
            }

            colorInputs.forEach(input => input.addEventListener("change", updatePrice));
            sizeInputs.forEach(input => input.addEventListener("change", updatePrice));


        });
    </script>
@endsection
