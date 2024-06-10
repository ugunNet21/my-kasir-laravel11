@extends('Admin.layouts.app')
@section('title', 'Create Services')
@section('content')

    <h1>Create New Service</h1>
    <form action="{{ route('services.store') }}" method="POST">
        @csrf
        <div class="mb-3 mt-3">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" name="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="category_id">Category:</label>
                <select name="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="technician_id">Technician:</label>
                <select name="technician_id" class="form-control" required>
                    @foreach ($technicians as $technician)
                        <option value="{{ $technician->id }}">{{ $technician->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

@endsection
