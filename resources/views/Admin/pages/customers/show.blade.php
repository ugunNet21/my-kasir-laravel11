@extends('Admin.layouts.app')
@section('title', 'Detail Customer')
@section('content')
    {{-- <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        @include('Admin.partials.styles')
    </head> --}}
    <body>
        {{-- <div class="container"> --}}
            <h1>Customer Details</h1>
            <div class="mb-3">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Name:</th>
                            <td>{{ $customer->name }}</td>
                        </tr>
                        <tr>
                            <th>Address:</th>
                            <td>{{ $customer->address }}</td>
                        </tr>
                        <tr>
                            <th>Phone:</th>
                            <td>{{ $customer->phone }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $customer->email }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <a href="{{ route('customers.index') }}" class="btn btn-primary">Back to Customers</a>
        {{-- </div> --}}
    {{-- </body>
    </html> --}}
@endsection
