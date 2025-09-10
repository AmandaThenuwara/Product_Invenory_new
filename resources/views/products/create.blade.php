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
    <div class="min-h-screen p-6 flex items-center justify-center">
        <div class="container max-w-screen-lg mx-auto">
            <div>
                <div class="flex items-center justify-between mb-6">
                    <h2 class="font-semibold text-2xl text-[#3B82F6]">Add New Product</h2>
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
                            <form action="{{ route('products.store') }}" method="POST" class="grid gap-4">
                                @csrf
                                @method('POST')
                                
                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-2">
                                    <div>
                                        <label for="name" class="text-[#3B82F6] font-medium">Product Name *</label>
                                        <input type="text" id="name" name="name" required 
                                            class="h-10 border-2 mt-1 rounded-lg px-4 w-full bg-[#F3F4F6] focus:outline-none focus:ring-1 focus:ring-[#3B82F6] focus:border-[#3B82F6] transition-colors">
                                    </div>

                                    <div>
                                        <label for="price" class="text-[#3B82F6] font-medium">Price *</label>
                                        <div class="relative">
                                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">$</span>
                                            <input type="number" id="price" name="price" step="0.01" required 
                                                class="h-10 border-2 mt-1 rounded-lg pl-8 pr-4 w-full bg-[#F3F4F6] focus:outline-none focus:ring-1 focus:ring-[#3B82F6] focus:border-[#3B82F6] transition-colors">
                                        </div>
                                    </div>

                                    <div>
                                        <label for="stock_quantity" class="text-[#3B82F6] font-medium">Stock Quantity *</label>
                                        <input type="number" id="stock_quantity" name="stock_quantity" required 
                                            class="h-10 border-2 mt-1 rounded-lg px-4 w-full bg-[#F3F4F6] focus:outline-none focus:ring-1 focus:ring-[#3B82F6] focus:border-[#3B82F6] transition-colors">
                                    </div>

                                    <div>
                                        <label for="category" class="text-[#3B82F6] font-medium">Category *</label>
                                        <select id="category" name="category" required 
                                            class="h-10 border-2 mt-1 rounded-lg px-4 w-full bg-[#F3F4F6] focus:outline-none focus:ring-1 focus:ring-[#3B82F6] focus:border-[#3B82F6] transition-colors">
                                            <option value="">Select a category</option>
                                            <option value="Electronics">Electronics</option>
                                            <option value="Clothing">Clothing</option>
                                            <option value="Food">Food</option>
                                            <option value="Books">Books</option>
                                            <option value="Furniture">Furniture</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="sku" class="text-[#3B82F6] font-medium">SKU *</label>
                                        <input type="text" id="sku" name="sku" required 
                                            class="h-10 border-2 mt-1 rounded-lg px-4 w-full bg-[#F3F4F6] focus:outline-none focus:ring-1 focus:ring-[#3B82F6] focus:border-[#3B82F6] transition-colors">
                                    </div>

                                    <div>
                                        <label for="supplier_name" class="text-[#3B82F6] font-medium">Supplier Name *</label>
                                        <select id="supplier_name" name="supplier_name" required 
                                            class="h-10 border-2 mt-1 rounded-lg px-4 w-full bg-[#F3F4F6] focus:outline-none focus:ring-1 focus:ring-[#3B82F6] focus:border-[#3B82F6] transition-colors">
                                            <option value="">Select a supplier</option>
                                            @foreach($suppliers as $supplier)
                                                <option value="{{ $supplier->company_name }}">{{ $supplier->company_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <label for="reorder_level" class="text-[#3B82F6] font-medium">Reorder Level</label>
                                        <input type="number" id="reorder_level" name="reorder_level" value="5" 
                                            class="h-10 border-2 mt-1 rounded-lg px-4 w-full bg-[#F3F4F6] focus:outline-none focus:ring-1 focus:ring-[#3B82F6] focus:border-[#3B82F6] transition-colors">
                                    </div>
                                </div>

                                <div class="md:col-span-2">
                                    <label for="description" class="text-[#3B82F6] font-medium">Description</label>
                                    <textarea id="description" name="description" rows="4"
                                        class="mt-1 block w-full rounded-lg border-2 px-4 py-2 bg-[#F3F4F6] focus:outline-none focus:ring-1 focus:ring-[#3B82F6] focus:border-[#3B82F6] transition-colors"></textarea>
                                </div>

                                <div class="md:col-span-2 text-right">
                                    <div class="inline-flex items-center">
                                        <button type="submit" class="bg-[#3B82F6] hover:opacity-90 text-white font-bold py-3 px-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-200">
                                            Add Product
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
</x-app-layout>