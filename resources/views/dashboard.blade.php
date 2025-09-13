<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- Summary Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <div class="text-gray-500 text-sm">Customers</div>
                    <div class="text-3xl font-bold">{{ \App\Models\Customer::count() }}</div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <div class="text-gray-500 text-sm">Invoices</div>
                    <div class="text-3xl font-bold">{{ \App\Models\Invoice::count() }}</div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <div class="text-gray-500 text-sm">Proposals</div>
                    <div class="text-3xl font-bold">{{ \App\Models\Proposal::count() }}</div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <div class="text-gray-500 text-sm">Revenue</div>
                    <div class="text-3xl font-bold">${{ number_format(\App\Models\Invoice::where('status', 'paid')->sum('amount'), 2) }}</div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('customers.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow transition">Add Customer</a>
                <a href="{{ route('invoices.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded shadow transition">Create Invoice</a>
                <a href="{{ route('proposals.create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded shadow transition">New Proposal</a>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Recent Invoices</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-2 px-4 text-left font-semibold text-gray-700">#</th>
                                <th class="py-2 px-4 text-left font-semibold text-gray-700">Customer</th>
                                <th class="py-2 px-4 text-left font-semibold text-gray-700">Amount</th>
                                <th class="py-2 px-4 text-left font-semibold text-gray-700">Status</th>
                                <th class="py-2 px-4 text-left font-semibold text-gray-700">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(\App\Models\Invoice::latest()->take(5)->get() as $invoice)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-2 px-4">{{ $invoice->id }}</td>
                                    <td class="py-2 px-4">{{ $invoice->customer->name ?? '-' }}</td>
                                    <td class="py-2 px-4">${{ number_format($invoice->amount, 2) }}</td>
                                    <td class="py-2 px-4">
                                        <span class="inline-block px-2 py-1 rounded text-xs font-bold bg-gray-200 text-gray-700">
                                            {{ ucfirst($invoice->status) }}
                                        </span>
                                    </td>
                                    <td class="py-2 px-4">{{ $invoice->created_at->format('Y-m-d') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
