<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-[#0D47A1] to-[#1976D2] rounded-xl shadow-lg overflow-hidden">
            <div class="p-6 flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <div class="bg-white/20 p-3 rounded-lg backdrop-blur-sm transform hover:scale-105 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-bold text-2xl text-white">{{ __('Orders Management') }}</h2>
                        <p class="text-blue-100 text-sm">Track and manage your orders efficiently</p>
                    </div>
                </div>
                <a href="{{ route('orders.create') }}" 
                   class="group px-6 py-3 bg-white/20 text-white rounded-lg hover:bg-white/30 transition-all duration-200 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span>{{ __('Create New Order') }}</span>
                </a>
            </div>
        </div>
    </x-slot>
    <div class="py-6 px-4 sm:px-6 lg:px-8 bg-[#F5F5F5]">
        @if(session()->has('success'))
            <div class="mb-6 p-4 rounded-lg bg-[#E3F2FD] border border-[#64B5F6] text-[#0D47A1] shadow-md animate-fade-in-down">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <div class="overflow-x-auto bg-white rounded-xl shadow-lg border border-[#64B5F6]/30">
            <div class="align-middle inline-block min-w-full">
                <table class="min-w-full divide-y divide-[#E3F2FD]">
                    <thead>
                        <tr class="bg-gradient-to-r from-[#0D47A1] to-[#1976D2] text-white">
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Order ID</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Supplier Name</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Order Date</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Total Amount</th>
                            <th class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($orders as $order)
                        <tr class="hover:bg-[#F8FAFC] transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#1E293B]">{{ $order->order_id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#0D47A1]">{{ $order->company_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#1E293B]">{{ $order->order_date }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full shadow-sm
                                    @if($order->status == 'Completed') bg-green-500 text-white
                                    @elseif($order->status == 'Pending') bg-yellow-500 text-white
                                    @else bg-gray-500 text-white @endif">
                                    {{ $order->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#0D47A1]">LKR {{ number_format($order->total_amount, 2) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                <a href="#" class="inline-flex items-center px-3 py-1 bg-[#0D47A1] text-white rounded-lg hover:bg-[#1976D2] transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    View
                                </a>
                                <a href="#" class="inline-flex items-center px-3 py-1 bg-[#0D47A1] text-white rounded-lg hover:bg-[#1976D2] transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                    Edit
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>