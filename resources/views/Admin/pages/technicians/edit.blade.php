@extends('Admin.layouts.app')
@section('title', 'Edit Technicians')
@section('content')

        <h1>Edit Technician</h1>
        <form action="{{ route('technicians.update', $technician->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control" value="{{ $technician->name }}" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" name="phone" class="form-control" value="{{ $technician->phone }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" value="{{ $technician->email }}" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Technician</button>
        </form>

@endsection
