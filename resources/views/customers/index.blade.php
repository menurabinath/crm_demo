<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customers') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Customers</h1>

                <a href="{{ route('customers.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow mb-4 inline-block transition">+ Add Customer</a>

                <div class="overflow-x-auto mt-4">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-3 px-4 text-left font-semibold text-gray-700">Name</th>
                                <th class="py-3 px-4 text-left font-semibold text-gray-700">Email</th>
                                <th class="py-3 px-4 text-left font-semibold text-gray-700">Company</th>
                                <th class="py-3 px-4 text-left font-semibold text-gray-700">Status</th>
                                <th class="py-3 px-4 text-left font-semibold text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-2 px-4">{{ $customer->name }}</td>
                                <td class="py-2 px-4">{{ $customer->email }}</td>
                                <td class="py-2 px-4">{{ $customer->company }}</td>
                                <td class="py-2 px-4">
                                    <span class="inline-block px-2 py-1 rounded text-xs font-bold {{ $customer->status == 'active' ? 'bg-green-100 text-green-700' : 'bg-gray-200 text-gray-700' }}">
                                        {{ ucfirst($customer->status) }}
                                    </span>
                                </td>
                                <td class="py-2 px-4">
                                    <a href="{{ route('customers.edit',$customer->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-1 px-3 rounded shadow mr-2 transition">Edit</a>
                                    <form action="{{ route('customers.destroy',$customer->id) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded shadow transition"
                                            onclick="return confirm('Delete this customer?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $customers->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
