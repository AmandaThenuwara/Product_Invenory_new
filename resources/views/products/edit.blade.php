<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F3F4F6]">
    <div class="min-h-screen p-6 flex items-center justify-center">
        <div class="container max-w-screen-lg mx-auto">
            <div>
                <div class="flex items-center justify-between mb-6">
                    <h2 class="font-semibold text-2xl text-[#3B82F6]">Edit Product</h2>
                    <a href="{{ route('products.index') }}" class="px-4 py-2 bg-[#3B82F6] text-white rounded-lg hover:opacity-90 transition-colors duration-200">
                        Back to Products
                    </a>
                </div>
                <div class="bg-white rounded-lg shadow-xl p-4 px-4 md:p-8 mb-6 border border-blue-100">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                        <div>
                            <p class="font-medium text-lg text-[#3B82F6]">Product Details</p>
                            <p class="text-gray-600">Please fill in all the required fields (*)</p>
                        </div>

                        <div class="lg:col-span-2">
                            <form action="{{route('products.update', ['product' => $product])}}" method="POST" class="grid gap-4">
                                @csrf
                                @method('PUT')
                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-2">
                                    <div>
                                        <label for="name" class="text-[#3B82F6] font-medium">Product Name *</label>
                                        <input type="text" id="name" name="name" value="{{ $product->name }}" required 
                                            class="h-10 border-2 mt-1 rounded-lg px-4 w-full bg-[#F3F4F6] focus:outline-none focus:ring-1 focus:ring-[#3B82F6] focus:border-[#3B82F6] transition-colors">
                                    </div>

                                    <div>
                                        <label for="price" class="text-[#3B82F6] font-medium">Price *</label>
                                        <div class="relative">
                                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">$</span>
                                            <input type="number" id="price" name="price" step="0.01" value="{{ $product->price }}" required 
                                                class="h-10 border-2 mt-1 rounded-lg pl-8 pr-4 w-full bg-[#F3F4F6] focus:outline-none focus:ring-1 focus:ring-[#3B82F6] focus:border-[#3B82F6] transition-colors">
                                        </div>
                                    </div>

                                    <div>
                                        <label for="stock_quantity" class="text-[#3B82F6] font-medium">Stock Quantity *</label>
                                        <input type="number" id="stock_quantity" name="stock_quantity" value="{{ $product->stock_quantity }}" required 
                                            class="h-10 border-2 mt-1 rounded-lg px-4 w-full bg-[#F3F4F6] focus:outline-none focus:ring-1 focus:ring-[#3B82F6] focus:border-[#3B82F6] transition-colors">
                                    </div>

                                    <div>
                                        <label for="category" class="text-[#3B82F6] font-medium">Category *</label>
                                        <input type="text" id="category" name="category" value="{{ $product->category }}" required 
                                            class="h-10 border-2 mt-1 rounded-lg px-4 w-full bg-[#F3F4F6] focus:outline-none focus:ring-1 focus:ring-[#3B82F6] focus:border-[#3B82F6] transition-colors">
                                    </div>

                                    <div>
                                        <label for="sku" class="text-[#3B82F6] font-medium">SKU *</label>
                                        <input type="text" id="sku" name="sku" value="{{ $product->sku }}" required 
                                            class="h-10 border-2 mt-1 rounded-lg px-4 w-full bg-[#F3F4F6] focus:outline-none focus:ring-1 focus:ring-[#3B82F6] focus:border-[#3B82F6] transition-colors">
                                    </div>

                                    <div>
                                        <label for="supplier_name" class="text-[#3B82F6] font-medium">Supplier Name *</label>
                                        <input type="text" id="supplier_name" name="supplier_name" value="{{ $product->supplier_name }}" required 
                                            class="h-10 border-2 mt-1 rounded-lg px-4 w-full bg-[#F3F4F6] focus:outline-none focus:ring-1 focus:ring-[#3B82F6] focus:border-[#3B82F6] transition-colors">
                                    </div>

                                    <div>
                                        <label for="reorder_level" class="text-[#3B82F6] font-medium">Reorder Level</label>
                                        <input type="number" id="reorder_level" name="reorder_level" value="{{ $product->reorder_level }}" 
                                            class="h-10 border-2 mt-1 rounded-lg px-4 w-full bg-[#F3F4F6] focus:outline-none focus:ring-1 focus:ring-[#3B82F6] focus:border-[#3B82F6] transition-colors">
                                    </div>
                                </div>

                                <div class="md:col-span-2">
                                    <label for="description" class="text-[#3B82F6] font-medium">Description</label>
                                    <textarea id="description" name="description" rows="4"
                                        class="mt-1 block w-full rounded-lg border-2 px-4 py-2 bg-[#F3F4F6] focus:outline-none focus:ring-1 focus:ring-[#3B82F6] focus:border-[#3B82F6] transition-colors">{{ $product->description }}</textarea>
                                </div>

                                <div class="md:col-span-2 text-right">
                                    <div class="inline-flex items-center">
                                        <button type="submit" class="bg-[#3B82F6] hover:opacity-90 text-white font-bold py-3 px-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-200">
                                            Update Product
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>