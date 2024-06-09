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
            <h1>Taxes</h1>
            <a href="{{ route('taxes.create') }}" class="btn btn-primary mb-3">Add New Tax</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Rate</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($taxes as $tax)
                        <tr>
                            <td>{{ $tax->name }}</td>
                            <td>{{ $tax->rate }}</td>
                            <td>
                                <a href="{{ route('taxes.edit', $tax->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('taxes.destroy', $tax->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this tax?')">Delete</button>
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
