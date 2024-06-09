{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
   <!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('Admin.partials.styles')
   </head>
   <body>
    <div class="container">
        <h1>Edit Service</h1>
        <form action="{{ route('services.update', $service->id) }}" method="POST">
            @csrf
            @method('PUT')
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
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($service->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="technician_id">Technician:</label>
                <select name="technician_id" class="form-control" required>
                    @foreach($technicians as $technician)
                        <option value="{{ $technician->id }}" @if($service->technician_id == $technician->id) selected @endif>{{ $technician->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
   </body>
   </html>
{{-- @endsection --}}
