@extends('admin.layout')

@section('title')
    Thêm biến thể
@endsection

@section('content')
    <div class="container">

        <form action="{{ route('admin.variants.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Lưu thông tin id sản phẩm -->
            <input type="hidden" name="product_id" value="{{ $id }}" id="">
            <div class="mb-3">
                <label for="" class="form-label">Hình ảnh</label>
                <input type="file" name="image" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Màu</label>
                <select name="color_id" id="" class="form-control">
                    @foreach ($colors as $color)
                        <option value="{{ $color->id }}">
                            {{ $color->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Size</label>
                <select name="size_id" id="" class="form-control">
                    @foreach ($sizes as $size)
                        <option value="{{ $size->id }}">
                            {{ $size->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Đơn giá</label>
                <input type="number" name="price" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Giá giảm</label>
                <input type="number" name="sale" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Số lượng</label>
                <input type="number" name="stock" id="" class="form-control">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </form>

    </div>
@endsection
