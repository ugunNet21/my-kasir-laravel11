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
use PDF;
use Illuminate\Support\Str;

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

        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully.');
    }

    public function show(Invoice $invoice) //Invoice
    {
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

    // Memperbarui faktur di database
    public function update(Request $request, $id)
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

        // Memperbarui Invoice
        $invoice = Invoice::findOrFail($id);
        $invoice->update([
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

        // Hapus item lama dan tambahkan item baru
        InvoiceItem::where('invoice_id', $id)->delete();
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
        // return response()->json(['message' => 'Invoice updated successfully!', 'invoice' => $invoice], 200);
        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully.');
    }

    public function printPdf(Invoice $invoice)
    {
        // Ambil data invoice
        $invoice->load('customer', 'paymentMethod', 'repairStatus', 'items');

        // Render HTML view ke dalam string
        $html = view('Admin.pages.invoices.pdf', compact('invoice'))->render();

        // Tampilkan PDF invoice menggunakan template PDF yang telah dibuat
        $pdf = PDF::loadView('Admin.pages.invoices.pdf', compact('invoice'));

        // variable date for plus download invoice pdf
        $date = date('Y-m-d');

        // Kembalikan PDF sebagai respons
        return $pdf->stream('Invoice-' . $date . Str::random(3));
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->items()->delete();
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully.');
    }
    public function indexStatus()
    {
        return view('Admin.pages.invoices.check-status');
    }
    public function checkStatus($id)
    {
        try {
            $invoice = Invoice::with('repairStatus')->find($id);

            try {
                if (!$invoice) {
                    return response()->json(['error' => 'Invoice not found'], 404);
                }
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }

            return response()->json([
                'status' => $invoice->repairStatus->status,
                'invoice_id' => $invoice->id,
                'customer' => $invoice->customer->name,
                'date' => $invoice->date,
                'total' => $invoice->total,
                'grand_total' => $invoice->grand_total,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }
}
