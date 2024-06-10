@extends('Admin.layouts.app')
@section('title', 'Add Technicians')
@section('content')

    <h1>Add New Technician</h1>
    <form action="{{ route('technicians.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Add Technician</button>
    </form>

@endsection
