<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Proposals</h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto">
        <a href="{{ route('proposals.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow mb-4 inline-block transition">+ Add Proposal</a>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">{{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-4 text-left font-semibold text-gray-700">ID</th>
                        <th class="py-3 px-4 text-left font-semibold text-gray-700">Customer</th>
                        <th class="py-3 px-4 text-left font-semibold text-gray-700">Title</th>
                        <th class="py-3 px-4 text-left font-semibold text-gray-700">Status</th>
                        <th class="py-3 px-4 text-left font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($proposals as $proposal)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 px-4">{{ $proposal->id }}</td>
                            <td class="py-2 px-4">{{ $proposal->customer->name }}</td>
                            <td class="py-2 px-4">{{ $proposal->title }}</td>
                            <td class="py-2 px-4">
                                <span class="inline-block px-2 py-1 rounded text-xs font-bold bg-gray-200 text-gray-700">
                                    {{ ucfirst($proposal->status) }}
                                </span>
                            </td>
                            <td class="py-2 px-4">
                                <a href="{{ route('proposals.edit', $proposal) }}" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold py-1 px-3 rounded shadow mr-2 transition">Edit</a>
                                <form action="{{ route('proposals.destroy', $proposal) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded shadow transition"
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
    </div>
</x-app-layout>
