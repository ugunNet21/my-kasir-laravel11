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
        <h1>Edit Tax</h1>
        <form action="{{ route('taxes.update', $tax->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $tax->name }}" required>
            </div>
            <div class="form-group">
                <label for="rate">Rate:</label>
                <input type="number" name="rate" class="form-control" value="{{ $tax->rate }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Tax</button>
        </form>
    </div>
   </body>
   </html>
{{-- @endsection --}}
