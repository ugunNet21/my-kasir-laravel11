@extends('Admin.layouts.app')
@section('title', 'Edit Taxes')
@section('content')

    <h1>Edit Tax</h1>
    <form action="{{ route('taxes.update', $tax->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $tax->name }}" required>
            </div>
            <div class="form-group">
                <label for="rate">Rate:</label>
                <input type="number" name="rate" class="form-control" value="{{ $tax->rate }}" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update Tax</button>
    </form>

@endsection
