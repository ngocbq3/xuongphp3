@foreach ($category->products as $product)
    <div>
        <div>Tên sản phẩm: <strong>{{ $product->name }}</strong></div>
        <div>Tên danh mục: <strong>{{ $category->name }}</strong></div>
    </div>
    <br>
@endforeach
