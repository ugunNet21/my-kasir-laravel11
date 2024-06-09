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
        <h1>Add New Repair Status</h1>
        <form action="{{ route('repairstatuses.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" name="status" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Repair Status</button>
        </form>
    </div>
   </body>
   </html>
{{-- @endsection --}}
