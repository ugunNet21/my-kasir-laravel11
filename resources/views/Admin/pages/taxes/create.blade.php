@extends('Admin.layouts.app')
@section('title', 'Create Taxes')
@section('content')

    <h1>Add New Tax</h1>
    <form action="{{ route('taxes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="rate">Rate:</label>
                <input type="number" name="rate" class="form-control" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Add Tax</button>
    </form>

@endsection
