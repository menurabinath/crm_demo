<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Add Invoice</h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto">
        <form action="{{ route('invoices.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label>Customer</label>
                <select name="customer_id" class="form-control">
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label>Proposal (Optional)</label>
                <select name="proposal_id" class="form-control">
                    <option value="">-- None --</option>
                    @foreach($proposals as $proposal)
                        <option value="{{ $proposal->id }}">{{ $proposal->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label>Amount</label>
                <input type="number" step="0.01" name="amount" class="form-control" required>
            </div>
            <div class="mb-4">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="pending">Pending</option>
                    <option value="paid">Paid</option>
                    <option value="failed">Failed</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Save Invoice</button>
        </form>
    </div>
</x-app-layout>
