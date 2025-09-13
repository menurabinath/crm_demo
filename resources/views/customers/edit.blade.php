<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Customer
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('customers.update', $customer->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" value="{{ $customer->name }}" placeholder="Name" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    <input type="email" name="email" value="{{ $customer->email }}" placeholder="Email" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    <input type="text" name="company" value="{{ $customer->company }}" placeholder="Company" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    <input type="text" name="phone" value="{{ $customer->phone }}" placeholder="Phone" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    <textarea name="address" placeholder="Address" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">{{ $customer->address }}</textarea>
                    <select name="status" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                        <option value="active" {{ $customer->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $customer->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    <textarea name="notes" placeholder="Notes" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">{{ $customer->notes }}</textarea>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow transition">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
