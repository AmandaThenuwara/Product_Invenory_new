<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Inventory</title>
    <style>
        body {
            background-color: #F3F4F6;
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #3B82F6;
        }
        table {
            width: 100%;
            background-color: white;
            border-collapse: collapse;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        th {
            background-color: #3B82F6;
            color: white;
            padding: 12px;
        }
        td {
            padding: 10px;
            border: 1px solid #F3F4F6;
        }
        a {
            color: #3B82F6;
            text-decoration: none;
        }
        .success-message {
            background-color: #3B82F6;
            color: white;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .add-button {
            display: inline-block;
            background-color: #3B82F6;
            color: white;
            padding: 10px 20px;
            margin: 20px 0;
            border-radius: 4px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Product Inventory</h1>
    <div>
        @if (session()->has('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
        @endif
    </div>

    <a href="{{ route('products.create') }}" class="add-button">Add New Product</a>
    <div>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock Quantity</th>
                <th>Category</th>
                <th>SKU</th>
                <th>Supplier Name</th>
                <th>Reorder Level</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock_quantity }}</td>
                <td>{{ $product->category }}</td>
                <td>{{ $product->sku }}</td>
                <td>{{ $product->supplier_name }}</td>
                <td>{{ $product->reorder_level }}</td>
                <td>{{ $product->description }}</td>

                <td><a href="{{ route('products.edit', ['product' => $product]) }}">Edit</a></td>
                <td>
                    <form action="{{ route('products.destroy', ['product' => $product]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</body>
</html>