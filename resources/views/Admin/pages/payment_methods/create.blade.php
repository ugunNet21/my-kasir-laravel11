@extends('Admin.layouts.app')
@section('title', 'Create payment method')
@section('content')
    <h2>Create Payment Method</h2>
    <form action="{{ route('paymentmethods.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="method">Method:</label>
            <input type="text" class="form-control" id="method" name="method">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
