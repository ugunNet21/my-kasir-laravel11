@extends('Admin.layouts.app')
@section('title', 'Add Spareparts')
@section('content')

    <h1>Add New Spare Part</h1>
    <form action="{{ route('spareparts.store') }}" method="POST">
        @csrf

        <div class="mb-3 mt-3">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="cost_price">Cost Price:</label>
                <input type="number" name="cost_price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="sale_price">Sale Price:</label>
                <input type="number" name="sale_price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" class="form-control" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Add Spare Part</button>

    </form>


@endsection
