<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Customer
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- important for PUT/PATCH requests -->

                    <input type="text" name="name" value="{{ $customer->name }}" placeholder="Name" class="form-control mb-2">
                    <input type="email" name="email" value="{{ $customer->email }}" placeholder="Email" class="form-control mb-2">
                    <input type="text" name="company" value="{{ $customer->company }}" placeholder="Company" class="form-control mb-2">
                    <input type="text" name="phone" value="{{ $customer->phone }}" placeholder="Phone" class="form-control mb-2">
                    <textarea name="address" placeholder="Address" class="form-control mb-2">{{ $customer->address }}</textarea>
                    <select name="status" class="form-control mb-2">
                        <option value="active" {{ $customer->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $customer->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    <textarea name="notes" placeholder="Notes" class="form-control mb-2">{{ $customer->notes }}</textarea>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
