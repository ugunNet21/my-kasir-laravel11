{{-- @extends('layouts.admin') --}}

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
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Invoice</h1>
                <a href="{{ route('invoices.index') }}" class="btn btn-secondary mb-3">Back to List</a>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="customer_id">Customer</label>
                        <select name="customer_id" id="customer_id" class="form-control">
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}" {{ $invoice->customer_id == $customer->id ? 'selected' : '' }}>
                                    {{ $customer->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $invoice->date) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" name="status" id="status" class="form-control" value="{{ old('status', $invoice->status) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="total">Total</label>
                        <input type="number" step="0.01" name="total" id="total" class="form-control" value="{{ old('total', $invoice->total) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="payment_method_id">Payment Method</label>
                        <select name="payment_method_id" id="payment_method_id" class="form-control">
                            @foreach ($paymentMethods as $paymentMethod)
                                <option value="{{ $paymentMethod->id }}" {{ $invoice->payment_method_id == $paymentMethod->id ? 'selected' : '' }}>
                                    {{ $paymentMethod->method }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="repair_status_id">Repair Status</label>
                        <select name="repair_status_id" id="repair_status_id" class="form-control">
                            @foreach ($repairStatuses as $repairStatus)
                                <option value="{{ $repairStatus->id }}" {{ $invoice->repair_status_id == $repairStatus->id ? 'selected' : '' }}>
                                    {{ $repairStatus->status }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="discount">Discount</label>
                        <input type="number" step="0.01" name="discount" id="discount" class="form-control" value="{{ old('discount', $invoice->discount) }}">
                    </div>
                    <div class="form-group">
                        <label for="tax">Tax</label>
                        <input type="number" step="0.01" name="tax" id="tax" class="form-control" value="{{ old('tax', $invoice->tax) }}">
                    </div>
                    <div class="form-group">
                        <label for="grand_total">Grand Total</label>
                        <input type="number" step="0.01" name="grand_total" id="grand_total" class="form-control" value="{{ old('grand_total', $invoice->grand_total) }}" required>
                    </div>
                    <button type="submit" class="btn btn-success">Update Invoice</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
{{-- @endsection --}}
