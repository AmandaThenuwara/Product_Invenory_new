<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard Overview') }}
            </h2>
            <div class="flex space-x-4">
                <span class="text-blue-600">{{ now()->format('l, F j, Y') }}</span>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-500 hover:shadow-lg transition duration-300">
                    <div class="flex items-center">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-600">Total Products</h3>
                            <p class="text-2xl font-bold text-blue-600">{{ App\Models\Product::count() ?? 0 }}</p>
                        </div>
                        <div class="bg-blue-100 rounded-full p-3">
                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-500 hover:shadow-lg transition duration-300">
                    <div class="flex items-center">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-600">Low Stock Items</h3>
                            <p class="text-2xl font-bold text-blue-600">
                                @php
                                    try {
                                        $lowStock = App\Models\Product::where('stock_quantity', '<', 10)->count();
                                    } catch (\Exception $e) {
                                        $lowStock = 0;
                                    }
                                @endphp
                                {{ $lowStock }}
                            </p>
                        </div>
                        <div class="bg-blue-100 rounded-full p-3">
                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-500 hover:shadow-lg transition duration-300">
                    <div class="flex items-center">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-600">Categories</h3>
                            <p class="text-2xl font-bold text-blue-600">#</p>
                        </div>
                        <div class="bg-blue-100 rounded-full p-3">
                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-500 hover:shadow-lg transition duration-300">
                    <div class="flex items-center">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-600">Total Stock Value</h3>
                            <p class="text-2xl font-bold text-blue-600">
                                @php
                                    try {
                                        $totalValue = App\Models\Product::selectRaw('SUM(price * stock_quantity) as total')->value('total') ?? 0;
                                        echo 'LKR' . number_format($totalValue, 2);
                                    } catch (\Exception $e) {
                                        echo '₱0.00';
                                    }
                                @endphp
                            </p>
                        </div>
                        <div class="bg-blue-100 rounded-full p-3">
                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white rounded-lg shadow">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Recent Products</h3>
                        <div class="space-y-4">
                            @foreach(App\Models\Product::latest()->take(5)->get() as $product)
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div>
                                    <h4 class="font-semibold text-gray-700">{{ $product->name }}</h4>
                                    <p class="text-sm text-gray-600">Stock: {{ $product->stock_quantity ?? 0 }}</p>
                                </div>
                                <span class="px-3 py-1 text-sm bg-blue-100 text-blue-600 rounded-full">
                                    {{ $product->created_at->diffForHumans() }}
                                </span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Quick Actions</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <a href="{{ route('products.create') }}" class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-blue-50 transition duration-300">
                                <div class="mr-4 bg-blue-100 rounded-full p-3">
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-700">Add Product</h4>
                                    <p class="text-sm text-gray-600">Create a new product</p>
                                </div>
                            </a>

                            <a href="#" class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-blue-50 transition duration-300">
                                <div class="mr-4 bg-blue-100 rounded-full p-3">
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-700">Add Category</h4>
                                    <p class="text-sm text-gray-600">Create a new category</p>
                                </div>
                            </a>

                            <a href="{{ route('products.index') }}" class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-blue-50 transition duration-300">
                                <div class="mr-4 bg-blue-100 rounded-full p-3">
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-700">View Inventory</h4>
                                    <p class="text-sm text-gray-600">Manage products</p>
                                </div>
                            </a>

                            <a href="#" class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-blue-50 transition duration-300">
                                <div class="mr-4 bg-blue-100 rounded-full p-3">
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-700">Reports</h4>
                                    <p class="text-sm text-gray-600">View analytics</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
