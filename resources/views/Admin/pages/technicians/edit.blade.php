{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
   <!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
   </head>
   <body>
    <div class="container">
        <h1>Edit Technician</h1>
        <form action="{{ route('technicians.update', $technician->id) }}" method="POST">
            @csrf
            @method('PUT')
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
            <button type="submit" class="btn btn-primary">Update Technician</button>
        </form>
    </div>
   </body>
   </html>
{{-- @endsection --}}
