@extends('Admin.layouts.app')
@section('title', 'Create Categories')
@section('content')
    <h2>Create Category</h2>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
