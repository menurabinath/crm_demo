<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Invoices</h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto">
        <a href="{{ route('invoices.create') }}" class="btn btn-primary mb-4">+ Add Invoice</a>

        @if(session('success'))
            <div class="alert alert-success mb-4">{{ session('success') }}</div>
        @endif

        <table class="table-auto w-full border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 border">ID</th>
                    <th class="p-2 border">Customer</th>
                    <th class="p-2 border">Proposal</th>
                    <th class="p-2 border">Amount</th>
                    <th class="p-2 border">Status</th>
                    <th class="p-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($invoices as $invoice)
                    <tr>
                        <td class="p-2 border">{{ $invoice->id }}</td>
                        <td class="p-2 border">{{ $invoice->customer->name }}</td>
                        <td class="p-2 border">{{ $invoice->proposal?->title ?? 'N/A' }}</td>
                        <td class="p-2 border">${{ number_format($invoice->amount, 2) }}</td>
                        <td class="p-2 border">{{ ucfirst($invoice->status) }}</td>
                        <td class="p-2 border">
                            <a href="{{ route('invoices.edit', $invoice) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('invoices.destroy', $invoice) }}" method="POST" class="inline-block">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this invoice?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="p-4 text-center">No invoices found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
