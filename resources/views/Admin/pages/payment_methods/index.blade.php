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
            <h2>Payment Methods</h2>
            <a href="{{ route('paymentmethods.create') }}" class="btn btn-primary mb-2">Create Payment Method</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Method</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($paymentMethods as $paymentMethod)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $paymentMethod->method }}</td>
                        <td>
                            <a href="{{ route('paymentmethods.show', $paymentMethod->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('paymentmethods.edit', $paymentMethod->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('paymentmethods.destroy', $paymentMethod->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
    </html>
{{-- @endsection --}}
