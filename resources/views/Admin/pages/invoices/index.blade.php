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
            <div class="row">
                <div class="col-md-12">
                    <h1>Invoices</h1>
                    <a href="{{ route('invoices.create') }}" class="btn btn-primary mb-3">Create Invoice</a>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>Payment Method</th>
                                        <th>Repair Status</th>
                                        <th>Discount</th>
                                        <th>Tax</th>
                                        <th>Grand Total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoices as $invoice)
                                        <tr>
                                            <td>{{ $invoice->id }}</td>
                                            <td>{{ $invoice->customer->name }}</td>
                                            <td>{{ $invoice->date }}</td>
                                            <td>{{ $invoice->status }}</td>
                                            <td>{{ $invoice->total }}</td>
                                            <td>{{ $invoice->paymentMethod->method }}</td>
                                            <td>{{ $invoice->repairStatus->status }}</td>
                                            <td>{{ $invoice->discount }}</td>
                                            <td>{{ $invoice->tax }}</td>
                                            <td>{{ $invoice->grand_total }}</td>
                                            <td>
                                                <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-info btn-sm">View</a>
                                                <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
{{-- @endsection --}}
