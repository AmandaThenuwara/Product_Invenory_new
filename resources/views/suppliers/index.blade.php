<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-[#F5F5F5] to-[#E3F2FD]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="bg-gradient-to-r from-[#0D47A1] to-[#1976D2] rounded-xl shadow-lg overflow-hidden mb-6">
                <div class="p-6 flex justify-between items-center">
                    <div class="flex items-center gap-4">
                        <div class="bg-white/20 p-3 rounded-lg backdrop-blur-sm transform hover:scale-105 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-2xl text-white">{{ __('Suppliers Management') }}</h2>
                            <p class="text-blue-100 text-sm">Manage your supplier relationships efficiently</p>
                        </div>
                    </div>
                    <a href="{{ route('suppliers.create') }}" 
                       class="group px-6 py-3 bg-white/20 text-white rounded-lg hover:bg-white/30 transition-all duration-200 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        <span>{{ __('Add New Supplier') }}</span>
                    </a>
                </div>
            </div>
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
                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">ID</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Company Name</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Contact Person</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Email</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Phone</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Address</th>
                            <th class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($suppliers as $supplier)
                        <tr class="hover:bg-[#F8FAFC] transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#1E293B]">{{ $supplier->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#0D47A1]">{{ $supplier->company_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#1E293B]">{{ $supplier->contact_person }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#1E293B]">
                                <a href="mailto:{{ $supplier->email }}" class="text-[#0D47A1] hover:text-[#1976D2] transition-colors duration-200">{{ $supplier->email }}</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#1E293B]">{{ $supplier->phone }}</td>
                            <td class="px-6 py-4 text-sm text-[#1E293B] max-w-xs truncate">{{ $supplier->address }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                <a href="#" class="inline-flex items-center px-3 py-1 bg-[#0D47A1] text-white rounded-lg hover:bg-[#1976D2] transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                    Edit
                                </a>
                                <form action="#" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="inline-flex items-center px-3 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors duration-200"
                                            onclick="return confirm('Are you sure you want to delete this supplier?')">
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
