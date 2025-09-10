@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Customers</h1>
    <a href="{{ route('customers.create') }}" class="btn btn-primary">Add Customer</a>
    <table class="table mt-3">
        <tr>
            <th>Name</th><th>Email</th><th>Company</th><th>Status</th><th>Actions</th>
        </tr>
        @foreach($customers as $customer)
        <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->company }}</td>
            <td>{{ ucfirst($customer->status) }}</td>
            <td>
                <a href="{{ route('customers.edit',$customer->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('customers.destroy',$customer->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"
                        onclick="return confirm('Delete this customer?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $customers->links() }}
</div>
@endsection
