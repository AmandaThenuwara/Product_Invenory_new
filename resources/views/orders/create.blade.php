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
                        <h2 class="font-bold text-2xl text-white">{{ __('Create New Order') }}</h2>
                        <p class="text-blue-100 text-sm">Add a new order to your system</p>
                    </div>
                </div>
                <a href="{{ route('orders.index') }}" 
                   class="group px-6 py-3 bg-white/20 text-white rounded-lg hover:bg-white/30 transition-all duration-200 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>{{ __('Back to Orders') }}</span>
                </a>
            </div>
        </div>
    </x-slot>
    <div class="py-6 px-4 sm:px-6 lg:px-8 bg-[#F5F5F5]">
        <div class="bg-white rounded-xl shadow-lg p-8 border border-[#64B5F6]/30">
            @if ($errors->any())
                <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200">
                    <div class="flex items-center gap-2 text-red-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="font-medium">{{ __('Whoops! Something went wrong.') }}</div>
                    </div>
                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('orders.store') }}" method="POST" class="space-y-6">
                @csrf
                @method('POST')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="order_id" class="block text-sm font-medium text-[#1E293B]">Order ID *</label>
                        <input type="text" id="order_id" name="order_id" required
                            class="mt-1 block w-full rounded-lg border-2 px-4 py-2 bg-[#F3F4F6] focus:outline-none focus:ring-1 focus:ring-[#3B82F6] focus:border-[#3B82F6] transition-colors">
                    </div>

                    <div>
                        <label for="company_name" class="block text-sm font-medium text-[#1E293B]">Supplier Name *</label>
                        <select id="company_name" name="company_name" required
                            class="mt-1 block w-full rounded-lg border-2 px-4 py-2 bg-[#F3F4F6] focus:outline-none focus:ring-1 focus:ring-[#3B82F6] focus:border-[#3B82F6] transition-colors">
                            <option value="">Select a supplier</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->company_name }}">{{ $supplier->company_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="order_date" class="block text-sm font-medium text-[#1E293B]">Order Date *</label>
                        <input type="date" id="order_date" name="order_date" required
                            class="mt-1 block w-full rounded-lg border-2 px-4 py-2 bg-[#F3F4F6] focus:outline-none focus:ring-1 focus:ring-[#3B82F6] focus:border-[#3B82F6] transition-colors">
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-[#1E293B]">Status *</label>
                        <select id="status" name="status" required
                            class="mt-1 block w-full rounded-lg border-2 px-4 py-2 bg-[#F3F4F6] focus:outline-none focus:ring-1 focus:ring-[#3B82F6] focus:border-[#3B82F6] transition-colors">
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                            <option value="canceled">Canceled</option>
                        </select>
                    </div>

                    <div>
                        <label for="total_amount" class="block text-sm font-medium text-[#1E293B]">Total Amount *</label>
                        <div class="relative mt-1">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">$</span>
                            <input type="number" id="total_amount" name="total_amount" step="0.01" required
                                class="block w-full rounded-lg border-2 pl-8 pr-4 py-2 bg-[#F3F4F6] focus:outline-none focus:ring-1 focus:ring-[#3B82F6] focus:border-[#3B82F6] transition-colors">
                        </div>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" 
                        class="px-6 py-3 bg-gradient-to-r from-[#0D47A1] to-[#1976D2] text-white rounded-lg shadow-md hover:shadow-xl hover:from-[#1976D2] hover:to-[#0D47A1] transition-all duration-300 transform hover:scale-105 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Create Order</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>