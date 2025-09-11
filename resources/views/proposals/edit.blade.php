<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Edit Proposal</h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto">
        <form action="{{ route('proposals.update', $proposal) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-4">
                <label>Customer</label>
                <select name="customer_id" class="form-control">
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{ $proposal->customer_id == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ $proposal->title }}" required>
            </div>
            <div class="mb-4">
                <label>Details</label>
                <textarea name="details" class="form-control">{{ $proposal->details }}</textarea>
            </div>
            <div class="mb-4">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="draft" {{ $proposal->status == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="approved" {{ $proposal->status == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ $proposal->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update Proposal</button>
        </form>
    </div>
</x-app-layout>
