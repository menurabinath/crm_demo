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
                <a href="{{ route('customers.create') }}" class="btn btn-primary">Add Customer</a>

                <table class="table mt-3">
                    <tr>
                        <th>Name</th><th>Email</th><th>Company</th><th>Status</th><th>Actions</th>
                    </tr>
                    @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->company }}</td>
                        <td>{{ ucfirst($customer->status) }}</td>
                        <td>
                            <a href="{{ route('customers.edit',$customer->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('customers.destroy',$customer->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this customer?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>

                {{ $customers->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
