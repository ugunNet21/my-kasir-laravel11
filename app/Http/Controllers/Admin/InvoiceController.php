<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceItem;
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
        // dd($invoices);
        return view('Admin.pages.invoices.index', compact('invoices'));
    }

    public function create()
    {
        $customers = Customer::all();
        $services = Service::all();
        $spareParts = SparePart::all();
        $paymentMethods = PaymentMethod::all();
        $repairStatuses = RepairStatus::all();
        // dd($paymentMethods);
        // dd($repairStatuses);
        return view('Admin.pages.invoices.create', compact('customers', 'services', 'spareParts', 'paymentMethods', 'repairStatuses'));
    }

    public function storeDu(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'date' => 'required|date',
            'status' => 'required',
            'total' => 'required|numeric',
            'payment_method_id' => 'required',
            'repair_status_id' => 'required',
            'discount' => 'nullable|numeric',
            'tax' => 'nullable|numeric',
            'grand_total' => 'required|numeric',
        ]);

        $invoice = Invoice::create($request->all());

        // dd($invoice);
        // Simpan item-item invoice disini

        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully.');
    }
    public function store(Request $request)
    {
        // Validasi data dari request
        $validatedData = $request->validate([
            'customer_id' => 'required|integer',
            'date' => 'required|date',
            'status' => 'required|string',
            'total' => 'required|numeric',
            'payment_method_id' => 'required|integer',
            'repair_status_id' => 'nullable|integer',
            'discount' => 'nullable|numeric',
            'tax' => 'nullable|numeric',
            'grand_total' => 'required|numeric',
            'items' => 'required|array',
            'items.*.description' => 'required|string',
            'items.*.quantity' => 'required|integer',
            'items.*.unit_price' => 'required|numeric',
            'items.*.total' => 'required|numeric',
        ]);

        // Membuat Invoice Baru
        $invoice = Invoice::create([
            'customer_id' => $validatedData['customer_id'],
            'date' => $validatedData['date'],
            'status' => $validatedData['status'],
            'total' => $validatedData['total'],
            'payment_method_id' => $validatedData['payment_method_id'],
            'repair_status_id' => $validatedData['repair_status_id'],
            'discount' => $validatedData['discount'],
            'tax' => $validatedData['tax'],
            'grand_total' => $validatedData['grand_total'],
        ]);

        // Menambahkan Item ke Invoice
        foreach ($validatedData['items'] as $item) {
            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'description' => $item['description'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['unit_price'],
                'total' => $item['total'],
            ]);
        }

        // Mengembalikan respon sukses
        // return response()->json(['message' => 'Invoice created successfully!', 'invoice' => $invoice], 201);
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

        // dd($invoice);
        return view('Admin.pages.invoices.edit', compact('invoice', 'customers', 'services', 'spareParts', 'paymentMethods', 'repairStatuses'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'customer_id' => 'required',
            'date' => 'required|date',
            'status' => 'required',
            'total' => 'required|numeric',
            'payment_method_id' => 'required',
            'repair_status_id' => 'required',
            'discount' => 'nullable|numeric',
            'tax' => 'nullable|numeric',
            'grand_total' => 'required|numeric',
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
