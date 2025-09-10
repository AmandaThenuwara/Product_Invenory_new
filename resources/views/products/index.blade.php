<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-2 rounded-lg shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">{{ __('Products Details') }}</h2>
                    <p class="text-sm text-gray-600">Manage your product details efficiently.</p>
                </div>
            </div>
            <a href="{{ route('products.create') }}" 
               class="group px-6 py-3 bg-gradient-to-r from-[#3B82F6] to-[#2563EB] text-white rounded-lg shadow-md hover:shadow-xl hover:from-[#2563EB] hover:to-[#1D4ED8] transition-all duration-300 transform hover:scale-105 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                <span>{{ __('Add New Product') }}</span>
            </a>
        </div>
    </x-slot>
    <div class="py-6 px-4 sm:px-6 lg:px-8 bg-[#F5F5F5]">
        @if (session()->has('success'))
        <div class="mb-4 p-4 rounded-lg bg-[#E3F2FD] border border-[#64B5F6] text-[#0D47A1] shadow-md animate-fade-in-down">
            {{ session('success') }}
        </div>
        @endif

        <div class="overflow-x-auto bg-white rounded-xl shadow-xl border border-[#64B5F6]/30">
            <div class="align-middle inline-block min-w-full">
                <table class="min-w-full divide-y divide-[#E3F2FD]">
                    <thead>
                        <tr class="bg-gradient-to-r from-[#0D47A1] to-[#1976D2] text-white">
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">ID</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Name</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Price</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Stock</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Category</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">SKU</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Supplier</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Reorder Level</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Description</th>
                            <th class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($products as $product)
                        <tr class="hover:bg-[#F8FAFC] transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#1E293B]">{{ $product->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#1E293B]">{{ $product->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#0D47A1]">LKR {{ number_format($product->price, 2) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <div class="flex items-center gap-2">
                                    <span class="font-medium {{ $product->stock_quantity <= $product->reorder_level ? 'text-red-600' : 'text-[#1E293B]' }}">
                                        {{ $product->stock_quantity }}
                                    </span>
                                    @if($product->stock_quantity <= $product->reorder_level)
                                        <div class="flex items-center gap-1 px-2 py-0.5 bg-red-50 border border-red-200 rounded">
                                            <svg class="w-3 h-3 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                            </svg>
                                            <span class="text-xs font-medium text-red-600">Low Stock</span>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gradient-to-r from-[#0D47A1] to-[#1976D2] text-white shadow-sm">
                                    {{ $product->category }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->sku }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->supplier_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->reorder_level }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 max-w-xs truncate">{{ $product->description }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                <a href="{{ route('products.edit', ['product' => $product]) }}" 
                                   class="inline-flex items-center px-3 py-1 bg-[#0D47A1] text-white rounded-lg hover:bg-[#1976D2] transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                    Edit
                                </a>
                                <form action="{{ route('products.destroy', ['product' => $product]) }}" 
                                      method="POST" 
                                      class="inline-block"
                                      onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="inline-flex items-center px-3 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>