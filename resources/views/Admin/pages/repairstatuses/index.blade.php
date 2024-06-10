@extends('Admin.layouts.app')
@section('title', 'Repair Status')
@section('content')

    <h1>Repair Statuses</h1>
    <a href="{{ route('repairstatuses.create') }}" class="btn btn-primary mb-3">Add New Repair Status</a>
    <table class="table">
        <thead>
            <tr>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($repairStatuses as $repairStatus)
                <tr>
                    <td>{{ $repairStatus->status }}</td>
                    <td>
                        <a href="{{ route('repairstatuses.edit', $repairStatus->id) }}"
                            class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('repairstatuses.destroy', $repairStatus->id) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this repair status?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
