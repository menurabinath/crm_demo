<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Edit Invoice</h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto">
        <form action="{{ route('invoices.update', $invoice) }}" method="POST" class="space-y-4">
            @csrf @method('PUT')
            <div>
                <label class="block mb-1 font-semibold">Customer</label>
                <select name="customer_id" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{ $invoice->customer_id == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block mb-1 font-semibold">Proposal (Optional)</label>
                <select name="proposal_id" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    <option value="">-- None --</option>
                    @foreach($proposals as $proposal)
                        <option value="{{ $proposal->id }}" {{ $invoice->proposal_id == $proposal->id ? 'selected' : '' }}>
                            {{ $proposal->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block mb-1 font-semibold">Amount</label>
                <input type="number" step="0.01" name="amount" value="{{ $invoice->amount }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
            </div>
            <div>
                <label class="block mb-1 font-semibold">Status</label>
                <select name="status" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    <option value="pending" {{ $invoice->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="paid" {{ $invoice->status == 'paid' ? 'selected' : '' }}>Paid</option>
                    <option value="failed" {{ $invoice->status == 'failed' ? 'selected' : '' }}>Failed</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow transition">Update Invoice</button>
        </form>
    </div>
</x-app-layout>
