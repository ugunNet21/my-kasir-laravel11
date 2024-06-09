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
            <h1>Add New Spare Part</h1>
            <form action="{{ route('spareparts.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="cost_price">Cost Price:</label>
                    <input type="number" name="cost_price" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="sale_price">Sale Price:</label>
                    <input type="number" name="sale_price" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Spare Part</button>
            </form>
        </div>
    </body>
    </html>
{{-- @endsection --}}
