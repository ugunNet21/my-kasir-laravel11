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
                @foreach($repairStatuses as $repairStatus)
                    <tr>
                        <td>{{ $repairStatus->status }}</td>
                        <td>
                            <a href="{{ route('repairstatuses.edit', $repairStatus->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('repairstatuses.destroy', $repairStatus->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this repair status?')">Delete</button>
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
