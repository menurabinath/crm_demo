<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Edit Proposal</h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto">
        <form action="{{ route('proposals.update', $proposal) }}" method="POST" class="space-y-4">
            @csrf @method('PUT')
            <div>
                <label class="block mb-1 font-semibold">Customer</label>
                <select name="customer_id" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{ $proposal->customer_id == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block mb-1 font-semibold">Title</label>
                <input type="text" name="title" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" value="{{ $proposal->title }}" required>
            </div>
            <div>
                <label class="block mb-1 font-semibold">Details</label>
                <textarea name="details" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">{{ $proposal->details }}</textarea>
            </div>
            <div>
                <label class="block mb-1 font-semibold">Status</label>
                <select name="status" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    <option value="draft" {{ $proposal->status == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="approved" {{ $proposal->status == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ $proposal->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow transition">Update Proposal</button>
        </form>
    </div>
</x-app-layout>
