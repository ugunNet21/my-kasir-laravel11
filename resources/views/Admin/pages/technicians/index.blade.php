@extends('Admin.layouts.app')
@section('title', 'Technisians')
@section('content')

    <h1>Technicians</h1>
    <a href="{{ route('technicians.create') }}" class="btn btn-primary mb-3">Add New Technician</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($technicians as $technician)
                <tr>
                    <td>{{ $technician->name }}</td>
                    <td>{{ $technician->phone }}</td>
                    <td>{{ $technician->email }}</td>
                    <td>
                        <a href="{{ route('technicians.edit', $technician->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('technicians.destroy', $technician->id) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this technician?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
