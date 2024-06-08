<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\PaymentMethod;
use App\Models\RepairStatus;
use App\Models\Service;
use App\Models\SparePart;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('customer', 'paymentMethod', 'repairStatus')->get();
        return view('Admin.pages.invoices.index', compact('invoices'));
    }

    public function create()
    {
        $customers = Customer::all();
        $services = Service::all();
        $spareParts = SparePart::all();
        $paymentMethods = PaymentMethod::all();
        $repairStatuses = RepairStatus::all();
        return view('Admin.pages.invoices.create', compact('customers', 'services', 'spareParts', 'paymentMethods', 'repairStatuses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'date' => 'required|date',
            'payment_method_id' => 'required',
            'repair_status_id' => 'required',
            'discount' => 'nullable|numeric',
            'tax' => 'nullable|numeric',
        ]);

        $invoice = Invoice::create($request->all());
        // Simpan item-item invoice disini

        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully.');
    }

    public function show(Invoice $invoice)
    {
        $invoice->load('items');
        return view('Admin.pages.invoices.show', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        $customers = Customer::all();
        $services = Service::all();
        $spareParts = SparePart::all();
        $paymentMethods = PaymentMethod::all();
        $repairStatuses = RepairStatus::all();
        return view('Admin.pages.invoices.edit', compact('invoice', 'customers', 'services', 'spareParts', 'paymentMethods', 'repairStatuses'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'customer_id' => 'required',
            'date' => 'required|date',
            'payment_method_id' => 'required',
            'repair_status_id' => 'required',
            'discount' => 'nullable|numeric',
            'tax' => 'nullable|numeric',
        ]);

        $invoice->update($request->all());
        // Perbarui item-item invoice disini

        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully.');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully.');
    }
}
