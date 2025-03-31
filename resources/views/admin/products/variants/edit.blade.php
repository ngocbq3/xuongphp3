@extends('admin.layout')

@section('title')
    Cập nhật biến thể
@endsection

@section('content')
    <div class="container">
        @session('message')
            <div class="alert alert-success">{{ session('message') }}</div>
        @endsession
        <form action="{{ route('admin.variants.update', $variant->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Lưu thông tin id sản phẩm -->
            <div class="mb-3">
                <label for="" class="form-label">Hình ảnh</label> <br>
                <img src="{{ Storage::URL($variant->image) }}" width="90">
                <input type="file" name="image" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Màu</label>
                <select name="color_id" id="" class="form-control">
                    @foreach ($colors as $color)
                        <option value="{{ $color->id }}" @selected($color->id == $variant->color_id)>
                            {{ $color->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Size</label>
                <select name="size_id" id="" class="form-control">
                    @foreach ($sizes as $size)
                        <option value="{{ $size->id }}" @selected($size->id == $variant->size_id)>
                            {{ $size->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Đơn giá</label>
                <input type="number" name="price" value="{{ $variant->price }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Giá giảm</label>
                <input type="number" name="sale" value="{{ $variant->sale }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Số lượng</label>
                <input type="number" name="stock" value="{{ $variant->stock }}" class="form-control">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="{{ route('admin.variants.index', $variant->product_id) }}" class="btn btn-primary">Danh sách</a>
            </div>
        </form>

    </div>
@endsection
