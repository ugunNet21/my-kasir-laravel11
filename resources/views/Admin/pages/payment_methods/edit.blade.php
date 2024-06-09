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
            <h2>Edit Payment Method</h2>
            <form action="{{ route('paymentmethods.update', $paymentmethod->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="method">Method:</label>
                    <input type="text" class="form-control" id="method" name="method" value="{{ $paymentmethod->method }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </body>
    </html>
{{-- @endsection --}}
