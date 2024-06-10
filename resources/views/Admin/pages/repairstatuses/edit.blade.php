@extends('Admin.layouts.app')
@section('title', 'Edit Repair Status')
@section('content')

    <h1>Edit Repair Status</h1>
    <form action="{{ route('repairstatuses.update', $repairstatus->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="status">Status:</label>
            <input type="text" name="status" class="form-control" value="{{ $repairstatus->status }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Repair Status</button>
    </form>

@endsection
