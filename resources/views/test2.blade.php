@foreach ($products as $product)
    <div>
        <div>ID {{ $product->id }}</div>
        <div>Tên sản phẩm: {{ $product->name }}</div>
        <div>Tên danh mục: {{ $product->category->name }}</div>
        @foreach ($product->variants as $variant)
            <div>
                <div>Color: {{ $variant->color->name }}</div>
                <div>Color Code: {{ $variant->color->code }}</div>
                <div>Size: {{ $variant->size->name }}</div>
            </div>
        @endforeach
    </div>
    <hr>
@endforeach
