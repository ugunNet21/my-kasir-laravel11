@extends('Admin.layouts.app')
@section('title', 'Edit | Invoices')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<style>
    body {
        background-color: #f8f9fa;
    }

    .container {
        margin-top: 50px;
    }

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
@section('content')
    <div class="mt-5 mb-5">
        <h2>Edit Invoice</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('invoices.update', $invoice->id) }}" method="POST" id="invoice-form">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="customer_id" class="form-label">Customer ID</label>
                {{-- <input type="number" class="form-control" id="customer_id" name="customer_id" value="{{ $invoice->customer_id }}" required> --}}
                <select name="customer_id" id="customer_id" class="form-control">
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}" {{ $invoice->customer_id == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $invoice->date }}" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" id="status" name="status" value="{{ $invoice->status }}" required>
            </div>
            <div class="mb-3">
                <label for="total" class="form-label">Total</label>
                <input type="number" class="form-control" id="total" name="total" value="{{ $invoice->total }}" required readonly>
            </div>
            <div class="mb-3">
                <label for="payment_method_id" class="form-label">Payment Method ID</label>
                {{-- <input type="number" class="form-control" id="payment_method_id" name="payment_method_id" value="{{ $invoice->payment_method_id }}" required> --}}
                <select name="payment_method_id" id="payment_method_id" class="form-control">
                    @foreach ($paymentMethods as $paymentMethod)
                        <option value="{{ $paymentMethod->id }}" {{ $invoice->payment_method_id == $paymentMethod->id ? 'selected' : '' }}>
                            {{ $paymentMethod->method }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="repair_status_id" class="form-label">Repair Status ID</label>
                {{-- <input type="number" class="form-control" id="repair_status_id" name="repair_status_id" value="{{ $invoice->repair_status_id }}"> --}}
                <select name="repair_status_id" id="repair_status_id" class="form-control">
                    @foreach ($repairStatuses as $repairStatus)
                        <option value="{{ $repairStatus->id }}" {{ $invoice->repair_status_id == $repairStatus->id ? 'selected' : '' }}>
                            {{ $repairStatus->status }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="discount" class="form-label">Discount</label>
                <input type="number" class="form-control" id="discount" name="discount" value="{{ $invoice->discount }}">
            </div>
            <div class="mb-3">
                <label for="tax" class="form-label">Tax</label>
                <input type="number" class="form-control" id="tax" name="tax" value="{{ $invoice->tax }}">
            </div>
            <div class="mb-3">
                <label for="grand_total" class="form-label">Grand Total</label>
                <input type="number" class="form-control" id="grand_total" name="grand_total" value="{{ $invoice->grand_total }}" required readonly>
            </div>

            <h4>Items</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="items">
                    @foreach ($invoice->items as $index => $item)
                        <tr>
                            <td><input type="text" name="items[{{ $index }}][description]" class="form-control" value="{{ $item->description }}" required></td>
                            <td><input type="number" name="items[{{ $index }}][quantity]" class="form-control quantity" value="{{ $item->quantity }}" required></td>
                            <td><input type="number" name="items[{{ $index }}][unit_price]" class="form-control unit_price" value="{{ $item->unit_price }}" required></td>
                            <td><input type="number" name="items[{{ $index }}][total]" class="form-control item_total" value="{{ $item->total }}" readonly required></td>
                            <td><button type="button" class="btn btn-danger remove-item">Remove</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="button" class="btn btn-success" id="add-item">Add Item</button>
            <button type="submit" class="btn btn-primary">Update Invoice</button>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            let itemIndex = {{ $invoice->items->count() }};

            $('#add-item').click(function () {
                let newRow = `<tr>
                    <td><input type="text" name="items[${itemIndex}][description]" class="form-control" required></td>
                    <td><input type="number" name="items[${itemIndex}][quantity]" class="form-control quantity" required></td>
                    <td><input type="number" name="items[${itemIndex}][unit_price]" class="form-control unit_price" required></td>
                    <td><input type="number" name="items[${itemIndex}][total]" class="form-control item_total" readonly required></td>
                    <td><button type="button" class="btn btn-danger remove-item">Remove</button></td>
                </tr>`;
                $('#items').append(newRow);
                itemIndex++;
            });

            $(document).on('click', '.remove-item', function () {
                $(this).closest('tr').remove();
                calculateTotal();
            });

            $(document).on('input', '.quantity, .unit_price', function () {
                let row = $(this).closest('tr');
                let quantity = row.find('.quantity').val();
                let unit_price = row.find('.unit_price').val();
                let total = quantity * unit_price;
                row.find('.item_total').val(total);
                calculateTotal();
            });

            $('#discount, #tax').on('input', function () {
                calculateTotal();
            });

            function calculateTotal() {
                let total = 0;
                $('.item_total').each(function () {
                    total += parseFloat($(this).val()) || 0;
                });
                $('#total').val(total);

                let discount = parseFloat($('#discount').val()) || 0;
                let tax = parseFloat($('#tax').val()) || 0;
                let grandTotal = total - discount + tax;
                $('#grand_total').val(grandTotal);
            }

            // Initial calculation
            calculateTotal();
        });
    </script>
@endsection
