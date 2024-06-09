<!DOCTYPE html>
<html>
<head>
    <title>Show Invoice</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Invoice Details</h2>
        <div class="mb-3">
            <label for="customer_id" class="form-label">Customer ID</label>
            <input type="text" class="form-control" id="customer_id" value="{{ $invoice->customer->name }}" readonly>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="text" class="form-control" id="date" value="{{ $invoice->date }}" readonly>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" class="form-control" id="status" value="{{ $invoice->status }}" readonly>
        </div>
        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="text" class="form-control" id="total" value="{{ $invoice->total }}" readonly>
        </div>
        <div class="mb-3">
            <label for="payment_method_id" class="form-label">Payment Method ID</label>
            <input type="text" class="form-control" id="payment_method_id" value="{{ $invoice->paymentMethod->method }}" readonly>
        </div>
        <div class="mb-3">
            <label for="repair_status_id" class="form-label">Repair Status ID</label>
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
            <input type="text" class="form-control" id="grand_total" value="{{ $invoice->grand_total }}" readonly>
        </div>

        <h4>Items</h4>
        <table class="table">
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
                        <td>{{ $item->unit_price }}</td>
                        <td>{{ $item->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
