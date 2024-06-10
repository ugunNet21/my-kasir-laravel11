@extends('Admin.layouts.app')
@section('title', 'Edit Methods')
@section('content')

    <h2>Edit Payment Method</h2>
    <form action="{{ route('paymentmethods.update', $paymentmethod->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="method">Method:</label>
            <input type="text" class="form-control" id="method" name="method" value="{{ $paymentmethod->method }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection
