<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-[#F5F5F5] to-[#E3F2FD]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="bg-gradient-to-r from-[#0D47A1] to-[#1976D2] rounded-xl shadow-lg overflow-hidden">
                <div class="p-6 flex justify-between items-center">
                    <div class="flex items-center gap-4">
                        <div class="bg-white/20 p-3 rounded-lg backdrop-blur-sm transform hover:scale-105 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-2xl text-white">{{ __('Edit Product') }}</h2>
                            <p class="text-blue-100 text-sm">Update product information</p>
                        </div>
                    </div>
                    <a href="{{ route('products.index') }}" class="group px-4 py-2 bg-white/20 text-white rounded-lg hover:bg-white/30 transition-all duration-200 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to Products
                    </a>
                </div>
            </div>

            <div class="mt-6">
                <div class="bg-white rounded-xl shadow-lg p-8 border border-[#64B5F6]/30">
                    <div class="grid gap-8 text-sm grid-cols-1 lg:grid-cols-4">
                        <div class="lg:col-span-1">
                            <div class="bg-gradient-to-br from-[#0D47A1] to-[#1976D2] text-white p-6 rounded-lg shadow-md sticky top-6">
                                <p class="font-bold text-xl mb-2">Product Details</p>
                                <p class="text-blue-100 text-sm mb-6">Please fill in all required fields (*)</p>
                                <div class="space-y-6">
                                    <div class="p-4 bg-white/10 rounded-lg backdrop-blur-sm">
                                        <h3 class="font-semibold mb-2 text-lg">Progress</h3>
                                        <ul class="space-y-3">
                                            <li class="flex items-center text-sm">
                                                <div class="w-6 h-6 rounded-full border-2 border-white/50 flex items-center justify-center mr-3">1</div>
                                                Basic Information
                                            </li>
                                            <li class="flex items-center text-sm">
                                                <div class="w-6 h-6 rounded-full border-2 border-white/50 flex items-center justify-center mr-3">2</div>
                                                Inventory Details
                                            </li>
                                            <li class="flex items-center text-sm">
                                                <div class="w-6 h-6 rounded-full border-2 border-white/50 flex items-center justify-center mr-3">3</div>
                                                Additional Info
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="p-4 bg-white/10 rounded-lg backdrop-blur-sm">
                                        <h3 class="font-semibold mb-2 text-lg">Tips</h3>
                                        <ul class="space-y-2 text-sm text-blue-100">
                                            <li class="flex items-center">
                                                <svg class="w-4 h-4 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                Fill in all required fields marked with (*)
                                            </li>
                                            <li class="flex items-center">
                                                <svg class="w-4 h-4 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                SKU must be unique
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="lg:col-span-3">
                            <form action="{{route('products.update', ['product' => $product])}}" method="POST" class="grid gap-6">
                                @csrf
                                @method('PUT')
                                <div class="grid gap-6 gap-y-4 text-sm grid-cols-1 md:grid-cols-3">
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

                                <div class="md:col-span-3">
                                    <label for="description" class="text-[#3B82F6] font-medium">Description</label>
                                    <textarea id="description" name="description" rows="4"
                                        class="mt-1 block w-full rounded-lg border-2 px-4 py-2 bg-[#F3F4F6] focus:outline-none focus:ring-1 focus:ring-[#3B82F6] focus:border-[#3B82F6] transition-colors">{{ $product->description }}</textarea>
                                </div>

                                <div class="md:col-span-2 text-right">
                                    <div class="inline-flex items-center">
                                        <button type="submit" class="bg-gradient-to-r from-[#0D47A1] to-[#1976D2] hover:from-[#1976D2] hover:to-[#0D47A1] text-white font-bold py-3 px-8 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                                            <span class="flex items-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                                </svg>
                                                Update Product
                                            </span>
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