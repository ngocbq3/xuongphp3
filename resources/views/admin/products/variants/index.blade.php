@extends('admin.layout')

@section('title')
    Danh sách biến thể của sản phẩm: {{ $product->name }}
@endsection

@section('content')
    <div class="container">
        <h3>
            Biến thể của sản phẩm: {{ $product->name }}
        </h3>
        <table class="table table-triped">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Hình</th>
                    <th scope="col">Màu</th>
                    <th scope="col">Size</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Đơn giá</th>
                    <th>
                        <a href="{{ route('admin.variants.create', $product->id) }}" class="btn btn-primary">Thêm mới</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product->variants as $variant)
                    <tr>
                        <th scope="row">{{ $variant->id }}</th>

                        <td>
                            <img src="{{ Storage::URL($variant->image) }}" width="90" alt="">
                        </td>
                        <td>
                            {{ $variant->color->name }}
                        </td>
                        <td>{{ $variant->size->name }}</td>
                        <td>
                            {{ $variant->stock }}
                        </td>
                        <td>{{ $variant->price }}</td>
                        <td>
                            <a href="{{ route('admin.variants.edit', $variant->id) }}" class="btn btn-primary">Sửa</a>

                            <form class="d-inline" action="{{ route('admin.variants.destroy', $variant->id) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Bạn có muốn xóa không?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
@endsection
