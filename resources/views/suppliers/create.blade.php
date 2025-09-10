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
                            <h2 class="font-bold text-2xl text-white">{{ __('Add New Supplier') }}</h2>
                            <p class="text-blue-100 text-sm">Create a new supplier profile</p>
                        </div>
                    </div>
                    <a href="{{ route('suppliers.index') }}" 
                       class="group px-6 py-3 bg-white/20 text-white rounded-lg hover:bg-white/30 transition-all duration-200 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        <span>{{ __('Back to Suppliers') }}</span>
                    </a>
                </div>
            </div>
  
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

            <form action="{{ route('suppliers.store') }}" method="POST" class="space-y-6">
                @csrf
                @method('POST')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="company_name" class="block text-sm font-medium text-[#1E293B]">Company Name *</label>
                        <input type="text" id="company_name" name="company_name" required
                            class="mt-1 block w-full rounded-lg border-2 px-4 py-2 bg-[#F3F4F6] focus:outline-none focus:ring-1 focus:ring-[#3B82F6] focus:border-[#3B82F6] transition-colors">
                    </div>

                    <div>
                        <label for="contact_person" class="block text-sm font-medium text-[#1E293B]">Contact Person *</label>
                        <input type="text" id="contact_person" name="contact_person" required
                            class="mt-1 block w-full rounded-lg border-2 px-4 py-2 bg-[#F3F4F6] focus:outline-none focus:ring-1 focus:ring-[#3B82F6] focus:border-[#3B82F6] transition-colors">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-[#1E293B]">Email Address *</label>
                        <input type="email" id="email" name="email" required
                            class="mt-1 block w-full rounded-lg border-2 px-4 py-2 bg-[#F3F4F6] focus:outline-none focus:ring-1 focus:ring-[#3B82F6] focus:border-[#3B82F6] transition-colors">
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-[#1E293B]">Phone Number *</label>
                        <input type="tel" id="phone" name="phone" required
                            class="mt-1 block w-full rounded-lg border-2 px-4 py-2 bg-[#F3F4F6] focus:outline-none focus:ring-1 focus:ring-[#3B82F6] focus:border-[#3B82F6] transition-colors">
                    </div>
                </div>

                <div>
                    <label for="address" class="block text-sm font-medium text-[#1E293B]">Address *</label>
                    <textarea id="address" name="address" rows="3" required
                        class="mt-1 block w-full rounded-lg border-2 px-4 py-2 bg-[#F3F4F6] focus:outline-none focus:ring-1 focus:ring-[#3B82F6] focus:border-[#3B82F6] transition-colors"></textarea>
                </div>

                <div class="flex justify-end">
                    <button type="submit" 
                        class="px-6 py-3 bg-gradient-to-r from-[#0D47A1] to-[#1976D2] text-white rounded-lg shadow-md hover:shadow-xl hover:from-[#1976D2] hover:to-[#0D47A1] transition-all duration-300 transform hover:scale-105 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Add Supplier</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>