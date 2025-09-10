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
    <h1>order details</h1>
    <a href="{{ route('orders.create') }}">Add New Order</a>
    
    <div>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Supplier Name</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Total Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->order_id }}</td>
                    <td>{{ $order->company_name }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td>{{ $order->status }}</td>
                    <td>${{ number_format($order->total_amount, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>