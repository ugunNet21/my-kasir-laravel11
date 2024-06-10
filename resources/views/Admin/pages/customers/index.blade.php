@extends('Admin.layouts.app')
@section('title', 'Customer')
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
            <h1>Customers</h1>
            <a href="{{ route('customers.create') }}" class="btn btn-primary">Add Customer</a>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>
                                <a href="{{ route('customers.show', $customer) }}" class="btn btn-info">View</a>
                                <a href="{{ route('customers.edit', $customer) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('customers.destroy', $customer) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        {{-- </div> --}}
    </body>
    {{-- </html> --}}
@endsection
