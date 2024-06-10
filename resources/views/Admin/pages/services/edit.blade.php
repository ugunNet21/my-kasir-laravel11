@extends('Admin.layouts.app')
@section('title', 'Edit Services')
@section('content')

    <h1>Edit Service</h1>
    <form action="{{ route('services.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')
       <div class="mb-3 mt-3">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $service->name }}" required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" name="price" class="form-control" value="{{ $service->price }}" required>
        </div>
        <div class="form-group">
            <label for="category_id">Category:</label>
            <select name="category_id" class="form-control" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($service->category_id == $category->id) selected @endif>
                        {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="technician_id">Technician:</label>
            <select name="technician_id" class="form-control" required>
                @foreach ($technicians as $technician)
                    <option value="{{ $technician->id }}" @if ($service->technician_id == $technician->id) selected @endif>
                        {{ $technician->name }}</option>
                @endforeach
            </select>
        </div>
       </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection
