@extends('Admin.layouts.app')
@section('title', 'Spareparts')
@section('content')
    <h1>Spare Parts</h1>
    <a href="{{ route('spareparts.create') }}" class="btn btn-primary mb-3">Add New Spare Part</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Cost Price</th>
                <th>Sale Price</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($spareParts as $sparePart)
                <tr>
                    <td>{{ $sparePart->name }}</td>
                    <td>{{ $sparePart->cost_price }}</td>
                    <td>{{ $sparePart->sale_price }}</td>
                    <td>{{ $sparePart->quantity }}</td>
                    <td>
                        <a href="{{ route('spareparts.edit', $sparePart->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('spareparts.destroy', $sparePart->id) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this spare part?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
