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
            <h2>Create Payment Method</h2>
            <form action="{{ route('paymentmethods.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="method">Method:</label>
                    <input type="text" class="form-control" id="method" name="method">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>
    </html>
{{-- @endsection --}}
