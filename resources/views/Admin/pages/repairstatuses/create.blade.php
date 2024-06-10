@extends('Admin.layouts.app')
@section('title', 'Edit Repair Status')
@section('content')

    <h1>Add New Repair Status</h1>
    <form action="{{ route('repairstatuses.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="status">Status:</label>
            <input type="text" name="status" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Repair Status</button>
    </form>

@endsection
