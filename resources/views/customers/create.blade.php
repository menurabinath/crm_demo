@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Customer</h1>
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
@endsection
