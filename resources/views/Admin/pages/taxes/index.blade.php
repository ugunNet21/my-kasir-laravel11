@extends('Admin.layouts.app')
@section('title', 'Taxes')
@section('content')

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
            @foreach ($taxes as $tax)
                <tr>
                    <td>{{ $tax->name }}</td>
                    <td>{{ $tax->rate }}</td>
                    <td>
                        <a href="{{ route('taxes.edit', $tax->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('taxes.destroy', $tax->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this tax?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
