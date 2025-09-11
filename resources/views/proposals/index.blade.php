<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Proposals</h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto">
        <a href="{{ route('proposals.create') }}" class="btn btn-primary mb-4">+ Add Proposal</a>

        @if(session('success'))
            <div class="alert alert-success mb-4">{{ session('success') }}</div>
        @endif

        <table class="table-auto w-full border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 border">ID</th>
                    <th class="p-2 border">Customer</th>
                    <th class="p-2 border">Title</th>
                    <th class="p-2 border">Status</th>
                    <th class="p-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($proposals as $proposal)
                    <tr>
                        <td class="p-2 border">{{ $proposal->id }}</td>
                        <td class="p-2 border">{{ $proposal->customer->name }}</td>
                        <td class="p-2 border">{{ $proposal->title }}</td>
                        <td class="p-2 border">{{ ucfirst($proposal->status) }}</td>
                        <td class="p-2 border">
                            <a href="{{ route('proposals.edit', $proposal) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('proposals.destroy', $proposal) }}" method="POST" class="inline-block">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this proposal?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="p-4 text-center">No proposals found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
