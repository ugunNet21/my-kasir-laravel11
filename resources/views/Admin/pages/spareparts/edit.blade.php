@extends('Admin.layouts.app')
@section('title', 'Edit Spareparts')
@section('content')

    <h1>Edit Spare Part</h1>
    <form action="{{ route('spareparts.update', $sparepart->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mt-3 mb-3">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $sparepart->name }}" required>
            </div>
            <div class="form-group">
                <label for="cost_price">Cost Price:</label>
                <input type="number" name="cost_price" class="form-control" value="{{ $sparepart->cost_price }}" required>
            </div>
            <div class="form-group">
                <label for="sale_price">Sale Price:</label>
                <input type="number" name="sale_price" class="form-control" value="{{ $sparepart->sale_price }}" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" class="form-control" value="{{ $sparepart->quantity }}" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update Spare Part</button>

    </form>


@endsection
