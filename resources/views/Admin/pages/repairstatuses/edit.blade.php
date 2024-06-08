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
            <h1>Edit Repair Status</h1>
            <form action="{{ route('repairstatuses.update', $repairstatus->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="status">Status:</label>
                    <input type="text" name="status" class="form-control" value="{{ $repairstatus->status }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Repair Status</button>
            </form>
        </div>
    </body>
    </html>
{{-- @endsection --}}
