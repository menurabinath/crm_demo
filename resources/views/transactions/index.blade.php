<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Transactions
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-4">

                @if(session('success'))
                    <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-3 px-4 text-left font-semibold text-gray-700">ID</th>
                                <th class="py-3 px-4 text-left font-semibold text-gray-700">Invoice</th>
                                <th class="py-3 px-4 text-left font-semibold text-gray-700">Customer</th>
                                <th class="py-3 px-4 text-left font-semibold text-gray-700">Amount</th>
                                <th class="py-3 px-4 text-left font-semibold text-gray-700">Status</th>
                                <th class="py-3 px-4 text-left font-semibold text-gray-700">Paid At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($transactions as $transaction)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-2 px-4">{{ $transaction->id }}</td>
                                    <td class="py-2 px-4">#{{ $transaction->invoice->id }}</td>
                                    <td class="py-2 px-4">{{ $transaction->invoice->customer->name }}</td>
                                    <td class="py-2 px-4">${{ $transaction->amount }}</td>
                                    <td class="py-2 px-4">
                                        <span class="inline-block px-2 py-1 rounded text-xs font-bold bg-gray-200 text-gray-700">
                                            {{ ucfirst($transaction->status) }}
                                        </span>
                                    </td>
                                    <td class="py-2 px-4">{{ $transaction->created_at->format('Y-m-d H:i') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="p-4 text-center">No transactions found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
