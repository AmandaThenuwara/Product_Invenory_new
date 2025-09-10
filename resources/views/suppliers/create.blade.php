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
    <h1>Create Supplier</h1>

    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf
        @method('POST')
        <div>
            <label for="company_name">Company Name:</label>
            <input type="text" id="company_name" name="company_name" required>
        </div>
        <div>
            <label for="contact_person">Contact Person:</label>
            <input type="text" id="contact_person" name="contact_person" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>
        </div>
        <div>
            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea>
        </div>
        <button type="submit">Add Supplier</button>
    </form>
</x-app-layout>