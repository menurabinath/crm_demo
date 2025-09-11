<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Edit Invoice</h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto">
        <form action="{{ route('invoices.update', $invoice) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-4">
                <label>Customer</label>
                <select name="customer_id" class="form-control">
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{ $invoice->customer_id == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label>Proposal (Optional)</label>
                <select name="proposal_id" class="form-control">
                    <option value="">-- None --</option>
                    @foreach($proposals as $proposal)
                        <option value="{{ $proposal->id }}" {{ $invoice->proposal_id == $proposal->id ? 'selected' : '' }}>
                            {{ $proposal->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label>Amount</label>
                <input type="number" step="0.01" name="amount" value="{{ $invoice->amount }}" class="form-control" required>
            </div>
            <div class="mb-4">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="pending" {{ $invoice->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="paid" {{ $invoice->status == 'paid' ? 'selected' : '' }}>Paid</option>
                    <option value="failed" {{ $invoice->status == 'failed' ? 'selected' : '' }}>Failed</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update Invoice</button>
        </form>
    </div>
</x-app-layout>
