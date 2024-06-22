@extends('Admin.layouts.app')
@section('title', 'Details | Invoices')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        /* .container {
            margin-top: 50px;
        } */

        h2, h4 {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control[readonly] {
            background-color: #e9ecef;
        }

        .card {
            border: none;
            border-radius: 0.75rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
        }

        .table thead th {
            background-color: #343a40;
            color: white;
        }

        .table-striped > tbody > tr:nth-of-type(odd) {
            background-color: #f2f2f2;
        }

        .table-responsive {
            margin-top: 20px;
        }
    </style>

    <div class="mt-3">
        <h2 class="text-center">Invoice Details</h2>
        <div class="card">
            <div class="mb-3">
                <label for="customer_id" class="form-label">Customer</label>
                <input type="text" class="form-control" id="customer_id" value="{{ $invoice->customer->name }}" readonly>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="text" class="form-control" id="date" value="{{ \Carbon\Carbon::parse($invoice->date)->locale('id')->isoFormat('D MMMM Y') }}" readonly>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" id="status" value="{{ $invoice->status }}" readonly>
            </div>
            <div class="mb-3">
                <label for="total" class="form-label">Total</label>
                <input type="text" class="form-control" id="total" value="Rp. {{ number_format($invoice->total, 0, ',', '.') }}" readonly>
            </div>
            <div class="mb-3">
                <label for="payment_method_id" class="form-label">Payment Method</label>
                <input type="text" class="form-control" id="payment_method_id" value="{{ $invoice->paymentMethod->method }}" readonly>
            </div>
            <div class="mb-3">
                <label for="repair_status_id" class="form-label">Repair Status</label>
                <input type="text" class="form-control" id="repair_status_id" value="{{ $invoice->repairStatus->status }}" readonly>
            </div>
            <div class="mb-3">
                <label for="discount" class="form-label">Discount</label>
                <input type="text" class="form-control" id="discount" value="{{ $invoice->discount }}" readonly>
            </div>
            <div class="mb-3">
                <label for="tax" class="form-label">Tax</label>
                <input type="text" class="form-control" id="tax" value="{{ $invoice->tax }}" readonly>
            </div>
            <div class="mb-3">
                <label for="grand_total" class="form-label">Grand Total</label>
                <input type="text" class="form-control" id="grand_total" value="Rp {{ number_format($invoice->grand_total, 0, ',', '.') }}" readonly>
            </div>
        </div>

        <h4>Items</h4>
        <div class="card mb-5">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoice->items as $item)
                        <tr>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>Rp {{ number_format($item->unit_price, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
