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
            <h2>Payment Method Details</h2>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Method: {{ $paymentmethod->method }}</h5>
                    <a href="{{ route('paymentmethods.edit', $paymentmethod->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('paymentmethods.destroy', $paymentmethod->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
    </html>
{{-- @endsection --}}
