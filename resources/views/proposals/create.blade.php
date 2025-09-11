<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Add Proposal</h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto">
        <form action="{{ route('proposals.store') }}" method="POST">
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
                <label>Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-4">
                <label>Details</label>
                <textarea name="details" class="form-control"></textarea>
            </div>
            <div class="mb-4">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="draft">Draft</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Save Proposal</button>
        </form>
    </div>
</x-app-layout>
