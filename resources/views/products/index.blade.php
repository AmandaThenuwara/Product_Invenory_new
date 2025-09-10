<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#3B82F6]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                {{ __('All Products') }}
            </h2>
            <a href="{{ route('products.create') }}" class="px-4 py-2 bg-gradient-to-r from-[#3B82F6] to-[#2563EB] text-white rounded-lg shadow-md hover:shadow-lg hover:from-[#2563EB] hover:to-[#1D4ED8] transition-all flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                {{ __('Add New Product') }}
            </a>
        </div>
    </x-slot>
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
</x-app-layout>