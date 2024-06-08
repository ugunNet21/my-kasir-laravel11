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
            <h1>Create Invoice</h1>
            <form action="{{ route('invoices.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="customer_id">Customer:</label>
                    <select name="customer_id" class="form-control" required>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Date:</label>
                    <input type="date" name="date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="payment_method_id">Payment Method:</label>
                    <select name="payment_method_id" class="form-control" required>
                        @foreach($paymentMethods as $paymentMethod)
                            <option value="{{ $paymentMethod->id }}">{{ $paymentMethod->method }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="repair_status_id">Repair Status:</label>
                    <select name="repair_status_id" class="form-control" required>
                        @foreach($repairStatuses as $repairStatus)
                            <option value="{{ $repairStatus->id }}">{{ $repairStatus->status }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="discount">Discount:</label>
                    <input type="number" step="0.01" name="discount" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tax">Tax:</label>
                    <input type="number" step="0.01" name="tax" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Create Invoice</button>
            </form>
        </div>
    </body>
    </html>
{{-- @endsection --}}
