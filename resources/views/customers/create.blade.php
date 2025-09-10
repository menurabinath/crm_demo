<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Customer
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('customers.store') }}" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Name" class="form-control mb-2">
                    <input type="email" name="email" placeholder="Email" class="form-control mb-2">
                    <input type="text" name="company" placeholder="Company" class="form-control mb-2">
                    <input type="text" name="phone" placeholder="Phone" class="form-control mb-2">
                    <textarea name="address" placeholder="Address" class="form-control mb-2"></textarea>
                    <select name="status" class="form-control mb-2">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    <textarea name="notes" placeholder="Notes" class="form-control mb-2"></textarea>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
