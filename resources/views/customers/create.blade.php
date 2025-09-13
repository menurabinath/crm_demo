<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Customer
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('customers.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="text" name="name" placeholder="Name" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    <input type="email" name="email" placeholder="Email" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    <input type="text" name="company" placeholder="Company" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    <input type="text" name="phone" placeholder="Phone" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    <textarea name="address" placeholder="Address" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"></textarea>
                    <select name="status" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    <textarea name="notes" placeholder="Notes" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"></textarea>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow transition">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
