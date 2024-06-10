@extends('Admin.layouts.app')
@section('title', 'Pages | Invoices')
@section('content')
    <div class="mt-1 mb-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Invoices</h1>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('invoices.create') }}" class="btn btn-primary mb-3" onclick="goCreate()" >Create Invoice</a>
                </div>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
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
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td>{{ $invoice->id }}</td> --}}
                                        <td>{{ $invoice->customer->name }}</td>
                                        <td>{{ $invoice->date }}</td>
                                        <td>{{ $invoice->status }}</td>
                                        <td>Rp.{{ number_format($invoice->total, 0, ',', '.' )}}</td>
                                        <td>{{ $invoice->paymentMethod->method }}</td>
                                        <td>{{ $invoice->repairStatus->status }}</td>
                                        <td>{{ $invoice->discount }}</td>
                                        <td>{{ $invoice->tax }}</td>
                                        <td>Rp.{{ number_format($invoice->grand_total, 0, ',', '.') }}</td>
                                        <td>
                                            <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-info btn-sm">View</a>
                                            <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="{{ route('print.invoices', $invoice->id) }}" class="btn btn-secondary btn-sm" target="_blank">Print</a>
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
                        <!-- Pagination links -->
                        <div class="d-flex justify-content-center">
                            {{ $invoices->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <nav class="navbar bottom-nav">
        <div class="container-fluid">
            <ul class="nav d-flex w-100">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 8 13.5V10a1 1 0 0 0-2 0v3.5a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 1 13.5V9.293l6-6zm5 6.914V13.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V9.207l-4-4-4 4zm-1-.707V13.5a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V9.207l-4-4-4 4V13.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V9.207l4-4z"/>
                        </svg>
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11.742 10.344a6.5 6.5 0 1 0-1.398 1.398h-.001l3.85 3.85a1 1 0 0 0 1.415-1.415l-3.85-3.85zm-5.688 1.005a5.5 5.5 0 1 1 7.78-7.78 5.5 5.5 0 0 1-7.78 7.78z"/>
                        </svg>
                        Search
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 1a5.978 5.978 0 0 0-4.708 2.364A4.977 4.977 0 0 1 8 12c1.532 0 2.933.692 3.708 1.364A5.978 5.978 0 0 0 8 10z"/>
                        </svg>
                        Profile
                    </a>
                </li>
            </ul>
        </div>
    </nav> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function goCreate() {
        window.location.href = "{{ route('invoices.create') }}";
    }
    </script>
@endsection
