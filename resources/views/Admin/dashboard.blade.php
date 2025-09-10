<x-app-layout>
    <div class="py-16 bg-[#F5F5F5]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            <!-- Welcome Section with Company Info -->
            <div class="bg-gradient-to-r from-[#0D47A1] to-[#64B5F6] rounded-xl shadow-lg mb-8 p-8 text-white">
                <div class="flex justify-between items-start space-y-6">
                    <div class="space-y-4">
                        <h1 class="text-4xl font-bold mb-2">Welcome Back, {{ auth()->user()->name }}!</h1>
                        <p class="text-blue-100 text-lg mb-6">Enterprise Inventory Management System</p>
                        <div class="flex space-x-4">
                            <span class="inline-flex items-center px-3 py-1 bg-blue-800 rounded-full text-sm">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Last sync: {{ now()->format('H:i') }}
                            </span>
                            <span class="inline-flex items-center px-3 py-1 bg-blue-800 rounded-full text-sm">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                </svg>
                                System Status: Operational
                            </span>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="bg-blue-800 rounded-lg p-4 inline-block">
                            <p class="text-sm opacity-80">Fiscal Year</p>
                            <p class="text-2xl font-bold">{{ date('Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-full bg-blue-100">
                            <svg class="h-8 w-8 text-[#0D47A1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <span class="text-sm text-green-500">↑ 12%</span>
                    </div>
                    <h2 class="text-gray-600 text-sm mb-1">Active Users</h2>
                    <div class="flex items-baseline">
                        <p class="text-2xl font-bold text-gray-800">{{ \App\Models\User::count() }}</p>
                        <span class="text-gray-500 text-sm ml-2">users</span>
                    </div>
                    <p class="text-gray-500 text-sm mt-2">+15 this week</p>
                </div>
                
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-full bg-green-100">
                            <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <span class="text-sm text-green-500">↑ 8%</span>
                    </div>
                    <h2 class="text-gray-600 text-sm mb-1">Total Products</h2>
                    <div class="flex items-baseline">
                        <p class="text-2xl font-bold text-gray-800">{{ \App\Models\Product::count() ?? 0 }}</p>
                        <span class="text-gray-500 text-sm ml-2">items</span>
                    </div>
                    <p class="text-gray-500 text-sm mt-2">+24 this month</p>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-full bg-yellow-100">
                            <svg class="h-8 w-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-sm text-yellow-500">↑ 5%</span>
                    </div>
                    <h2 class="text-gray-600 text-sm mb-1">Pending Orders</h2>
                    <div class="flex items-baseline">
                        <p class="text-2xl font-bold text-gray-800">{{ \App\Models\Order::count() ?? 0 }}</p>
                        <span class="text-gray-500 text-sm ml-2">orders</span>
                    </div>
                    <p class="text-gray-500 text-sm mt-2">Needs processing</p>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-full bg-indigo-100">
                            <svg class="h-8 w-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-sm text-green-500">↑ 23%</span>
                    </div>
                    <h2 class="text-gray-600 text-sm mb-1">Monthly Revenue</h2>
                    <div class="flex items-baseline">
                        <p class="text-2xl font-bold text-gray-800">$52,000</p>
                    </div>
                    <p class="text-gray-500 text-sm mt-2">+$12k this month</p>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-gradient-to-br from-[#0D47A1] to-[#64B5F6] overflow-hidden shadow-lg rounded-xl mb-8">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-white mb-4">Quick Actions</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <a href="#" class="inline-flex items-center px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            Manage Users
                        </a>
                        <a href="{{ route('products.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Add Product
                        </a>
                        <a href="{{ route('orders.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            View Orders
                        </a>
                        <a href="#" class="inline-flex items-center px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Reports
                        </a>
                    </div>
                </div>
            </div>

            

            <!-- Additional Enterprise Metrics -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Sales Performance -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-[#0D47A1] mb-4">Sales Performance</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="p-4 bg-gray-50 rounded-lg">
                            <p class="text-sm text-gray-600">Monthly Revenue</p>
                            <p class="text-2xl font-bold text-gray-800">$52,000</p>
                            <span class="text-green-500 text-sm">↑ 12.5%</span>
                        </div>
                        <div class="p-4 bg-gray-50 rounded-lg">
                            <p class="text-sm text-gray-600">Average Order Value</p>
                            <p class="text-2xl font-bold text-gray-800">$750</p>
                            <span class="text-green-500 text-sm">↑ 8.2%</span>
                        </div>
                        <div class="p-4 bg-gray-50 rounded-lg">
                            <p class="text-sm text-gray-600">Conversion Rate</p>
                            <p class="text-2xl font-bold text-gray-800">3.2%</p>
                            <span class="text-red-500 text-sm">↓ 1.4%</span>
                        </div>
                        <div class="p-4 bg-gray-50 rounded-lg">
                            <p class="text-sm text-gray-600">Customer Retention</p>
                            <p class="text-2xl font-bold text-gray-800">85%</p>
                            <span class="text-green-500 text-sm">↑ 5.0%</span>
                        </div>
                    </div>
                </div>

                <!-- Inventory Health -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-[#0D47A1] mb-4">Inventory Health</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="p-4 bg-gray-50 rounded-lg">
                            <p class="text-sm text-gray-600">Stock Turnover</p>
                            <p class="text-2xl font-bold text-gray-800">4.5x</p>
                            <span class="text-gray-500 text-sm">Last 30 days</span>
                        </div>
                        <div class="p-4 bg-gray-50 rounded-lg">
                            <p class="text-sm text-gray-600">Low Stock Items</p>
                            <p class="text-2xl font-bold text-gray-800">12</p>
                            <span class="text-red-500 text-sm">Needs attention</span>
                        </div>
                        <div class="p-4 bg-gray-50 rounded-lg">
                            <p class="text-sm text-gray-600">Storage Utilization</p>
                            <p class="text-2xl font-bold text-gray-800">78%</p>
                            <span class="text-yellow-500 text-sm">Optimal: 60-80%</span>
                        </div>
                        <div class="p-4 bg-gray-50 rounded-lg">
                            <p class="text-sm text-gray-600">Aging Inventory</p>
                            <p class="text-2xl font-bold text-gray-800">5%</p>
                            <span class="text-green-500 text-sm">Within target</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Users Table -->
            <div class="bg-white overflow-hidden shadow-lg rounded-xl">
                <div class="p-8">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h3 class="text-2xl font-bold text-[#0D47A1]">Recent Users</h3>
                            <p class="text-gray-600 mt-1">Latest registered users in the system</p>
                        </div>
                        <a href="#" class="inline-flex items-center px-4 py-2 bg-[#0D47A1] hover:bg-[#1565C0] text-white text-sm font-medium rounded-lg transition-colors duration-300">
                            View All
                            <svg class="ml-2 -mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Joined</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach(\App\Models\User::latest()->take(5)->get() as $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->created_at->diffForHumans() }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex space-x-3">
                                            <a href="#" 
                                               class="inline-flex items-center px-3 py-1 border border-[#0D47A1] text-[#0D47A1] hover:bg-[#0D47A1] hover:text-white rounded-lg transition-colors duration-300">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Edit
                                            </a>
                                            <form class="inline-block" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="inline-flex items-center px-3 py-1 border border-red-500 text-red-500 hover:bg-red-500 hover:text-white rounded-lg transition-colors duration-300">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- System Settings and Configuration -->
            <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold text-[#0D47A1]">System Configuration</h3>
                    <button class="bg-[#0D47A1] text-white px-4 py-2 rounded-lg hover:bg-[#1565C0] transition-colors duration-300">
                        Save Changes
                    </button>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Notification Settings -->
                    <div class="border rounded-lg p-4">
                        <h4 class="font-semibold mb-4">Notification Preferences</h4>
                        <div class="space-y-3">
                            <label class="flex items-center">
                                <input type="checkbox" class="form-checkbox text-[#0D47A1]" checked>
                                <span class="ml-2">Low Stock Alerts</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="form-checkbox text-[#0D47A1]" checked>
                                <span class="ml-2">Order Updates</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="form-checkbox text-[#0D47A1]">
                                <span class="ml-2">Price Changes</span>
                            </label>
                        </div>
                    </div>

                    <!-- Integration Settings -->
                    <div class="border rounded-lg p-4">
                        <h4 class="font-semibold mb-4">Integrations</h4>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span>QuickBooks</span>
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-sm">Connected</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span>Shopify</span>
                                <span class="px-2 py-1 bg-gray-100 text-gray-800 rounded-full text-sm">Configure</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span>Shipping API</span>
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-sm">Connected</span>
                            </div>
                        </div>
                    </div>

                    <!-- System Health -->
                    <div class="border rounded-lg p-4">
                        <h4 class="font-semibold mb-4">System Health</h4>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span>Database Backup</span>
                                <span class="text-green-500">Up to date</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span>Last Security Scan</span>
                                <span class="text-gray-500">2 days ago</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span>Server Load</span>
                                <span class="text-green-500">Normal (45%)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

