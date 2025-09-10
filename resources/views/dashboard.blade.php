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
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300">
                    <div class="flex items-center">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-white opacity-90">Total Products</h3>
                            <p class="text-3xl font-bold text-white mt-2">{{ App\Models\Product::count() ?? 0 }}</p>
                        </div>
                        <div class="bg-white/20 rounded-full p-3">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300">
                    <div class="flex items-center">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-white opacity-90">Low Stock Items</h3>
                            <p class="text-3xl font-bold text-white mt-2">
                                0
                            </p>
                        </div>
                        <div class="bg-white/20 rounded-full p-3">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300">
                    <div class="flex items-center">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-white opacity-90">Categories</h3>
                            <p class="text-3xl font-bold text-white mt-2">4</p>
                        </div>
                        <div class="bg-white/20 rounded-full p-3">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300">
                    <div class="flex items-center">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-white opacity-90">Total Stock Value</h3>
                            <p class="text-3xl font-bold text-white mt-2">
                                @php
                                    try {
                                        $totalValue = App\Models\Product::selectRaw('SUM(price * stock_quantity) as total')->value('total') ?? 0;
                                        echo 'LKR ' . number_format($totalValue, 2);
                                    } catch (\Exception $e) {
                                        echo 'LKR0.00';
                                    }
                                @endphp
                            </p>
                        </div>
                        <div class="bg-white/20 rounded-full p-3">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Sections -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <!-- Recent Products -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                                <span class="bg-blue-100 rounded-lg p-2 mr-3">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                    </svg>
                                </span>
                                Recent Products
                            </h3>
                            <a href="{{ route('products.index') }}" class="text-blue-600 hover:text-blue-800 font-medium flex items-center hover:bg-blue-50/50 px-3 py-2 rounded-lg transition-all duration-200">
                                View All
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                        <div class="space-y-4">
                            @foreach(App\Models\Product::latest()->take(5)->get() as $product)
                            <div class="flex items-center justify-between p-4 bg-gray-50/50 rounded-xl hover:bg-blue-50/50 transition-all duration-200 border border-gray-100/50 group">
                                <div>
                                    <h4 class="font-semibold text-gray-800 group-hover:text-blue-600 transition-colors duration-200">{{ $product->name }}</h4>
                                    <p class="text-sm text-gray-600 mt-1">Stock: {{ $product->stock_quantity ?? 0 }}</p>
                                </div>
                                <div class="flex flex-col items-end">
                                    <span class="text-blue-600 font-semibold bg-blue-50/50 px-3 py-1 rounded-full">LKR{{ number_format($product->price, 2) }}</span>
                                    <span class="text-xs text-gray-500 mt-1">{{ $product->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Recent Orders -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                                <span class="bg-amber-100 rounded-lg p-2 mr-3">
                                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                    </svg>
                                </span>
                                Recent Orders
                            </h3>
                            <a href="{{ route('orders.index') }}" class="text-amber-600 hover:text-amber-800 font-medium flex items-center hover:bg-amber-50/50 px-3 py-2 rounded-lg transition-all duration-200">
                                View All
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                        <div class="space-y-4">
                            @foreach(App\Models\Order::latest()->take(5)->get() as $order)
                            <div class="flex items-center justify-between p-4 bg-gray-50/50 rounded-xl hover:bg-amber-50/50 transition-all duration-200 border border-gray-100/50 group">
                                <div>
                                    <h4 class="font-semibold text-gray-800 group-hover:text-amber-600 transition-colors duration-200">Order #{{ $order->id }}</h4>
                                    <p class="text-sm text-gray-600 mt-1">{{ $order->supplier_name }}</p>
                                </div>
                                <div class="flex flex-col items-end">
                                    <span class="px-3 py-1 text-xs rounded-full font-medium
                                        @if($order->status == 'Completed') bg-green-100 text-green-700 border border-green-200
                                        @elseif($order->status == 'Pending') bg-amber-100 text-amber-700 border border-amber-200
                                        @else bg-gray-100 text-gray-700 border border-gray-200 @endif">
                                        {{ $order->status }}
                                    </span>
                                    <span class="text-xs text-gray-500 mt-2">{{ $order->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Recent Suppliers -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                                <span class="bg-purple-100 rounded-lg p-2 mr-3">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </span>
                                Recent Suppliers
                            </h3>
                            <a href="{{ route('suppliers.index') }}" class="text-purple-600 hover:text-purple-800 font-medium flex items-center hover:bg-purple-50/50 px-3 py-2 rounded-lg transition-all duration-200">
                                View All
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                        <div class="space-y-4">
                            @foreach(App\Models\Supplier::latest()->take(5)->get() as $supplier)
                            <div class="flex items-center justify-between p-4 bg-gray-50/50 rounded-xl hover:bg-purple-50/50 transition-all duration-200 border border-gray-100/50 group">
                                <div>
                                    <h4 class="font-semibold text-gray-800 group-hover:text-purple-600 transition-colors duration-200">{{ $supplier->company_name }}</h4>
                                    <p class="text-sm text-gray-600 mt-1">{{ $supplier->contact_person }}</p>
                                </div>
                                <div class="flex items-center">
                                    <a href="mailto:{{ $supplier->email }}" class="text-purple-600 hover:text-purple-800 bg-purple-50/50 p-2 rounded-lg hover:bg-purple-100/50 transition-all duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-gradient-to-br from-white to-gray-50/50 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                <div class="p-8">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
                        <span class="bg-indigo-100 rounded-lg p-2 mr-3">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </span>
                        Quick Actions
                    </h3>
                    <div class="grid grid-cols-2 gap-6">
                        <a href="{{ route('products.create') }}" class="group flex items-center p-6 bg-white rounded-xl hover:bg-blue-50/50 transition-all duration-300 border border-gray-100 hover:border-blue-200 hover:shadow-lg hover:-translate-y-0.5">
                            <div class="mr-4 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-3 shadow-lg shadow-blue-500/20 group-hover:shadow-blue-500/30 transition-all duration-300">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 transition-colors duration-200">Add Product</h4>
                                <p class="text-sm text-gray-600 mt-1">Create a new product</p>
                            </div>
                        </a>

                            <a href="#" class="group flex items-center p-6 bg-white rounded-xl hover:bg-emerald-50/50 transition-all duration-300 border border-gray-100 hover:border-emerald-200 hover:shadow-lg hover:-translate-y-0.5">
                                <div class="mr-4 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl p-3 shadow-lg shadow-emerald-500/20 group-hover:shadow-emerald-500/30 transition-all duration-300">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-800 group-hover:text-emerald-600 transition-colors duration-200">Add Category</h4>
                                    <p class="text-sm text-gray-600 mt-1">Create a new category</p>
                                </div>
                            </a>

                            <a href="{{ route('products.index') }}" class="group flex items-center p-6 bg-white rounded-xl hover:bg-indigo-50/50 transition-all duration-300 border border-gray-100 hover:border-indigo-200 hover:shadow-lg hover:-translate-y-0.5">
                                <div class="mr-4 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl p-3 shadow-lg shadow-indigo-500/20 group-hover:shadow-indigo-500/30 transition-all duration-300">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-800 group-hover:text-indigo-600 transition-colors duration-200">View Inventory</h4>
                                    <p class="text-sm text-gray-600 mt-1">Manage products</p>
                                </div>
                            </a>

                            <a href="#" class="group flex items-center p-6 bg-white rounded-xl hover:bg-purple-50/50 transition-all duration-300 border border-gray-100 hover:border-purple-200 hover:shadow-lg hover:-translate-y-0.5">
                                <div class="mr-4 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl p-3 shadow-lg shadow-purple-500/20 group-hover:shadow-purple-500/30 transition-all duration-300">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-800 group-hover:text-purple-600 transition-colors duration-200">Reports</h4>
                                    <p class="text-sm text-gray-600 mt-1">View analytics</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
