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
            <h1>Service Details</h1>
            <table class="table">
                <tr>
                    <th>Name:</th>
                    <td>{{ $service->name }}</td>
                </tr>
                <tr>
                    <th>Price:</th>
                    <td>{{ $service->price }}</td>
                </tr>
                <tr>
                    <th>Category:</th>
                    <td>{{ $service->category->name }}</td>
                </tr>
                <tr>
                    <th>Technician:</th>
                    <td>{{ $service->technician->name }}</td>
                </tr>
            </table>
        </div>
    </body>
    </html>
{{-- @endsection --}}
