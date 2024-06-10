@extends('Admin.layouts.app')

@section('content')
    <h1>Edit Customer</h1>
    <form action="{{ route('customers.update', $customer) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $customer->name }}" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ $customer->address }}"
                    required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ $customer->phone }}"
                    required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $customer->email }}"
                    required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
