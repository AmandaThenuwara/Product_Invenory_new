<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit Page</h1>
    <div>
    <form action="{{route('products.update', ['product' => $product])}}" method="POST" >
        @csrf
        @method('PUT')
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" value="{{ $product->name }}" required><br><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" value="{{ $product->price }}" required><br><br>

        <label for="stock_quantity">Stock Quantity:</label>
        <input type="number" id="stock_quantity" name="stock_quantity" value="{{ $product->stock_quantity }}" required><br><br>

        <label for="category">Category:</label>
        <input type="text" id="category" name="category" value="{{ $product->category }}" required><br><br>

        <label for="sku">SKU:</label>
        <input type="text" id="sku" name="sku" value="{{ $product->sku }}" required><br><br>

        <label for="supplier_name">Supplier Name:</label>
        <input type="text" id="supplier_name" name="supplier_name" value="{{ $product->supplier_name }}" required><br><br>

        <label for="reorder_level">Reorder Level:</label>
        <input type="number" id="reorder_level" name="reorder_level" value="{{ $product->reorder_level }}"><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description">{{ $product->description }}</textarea><br><br>

        <button type="submit">Update Product</button>
    </form>
    </div>
</body>
</html>