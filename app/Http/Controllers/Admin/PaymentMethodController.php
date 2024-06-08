<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    // Display a listing of the payment methods.
    // public function index()
    // {
    //     $paymentMethods = PaymentMethod::all();
    //     return view('Admin.pages.payment_methods.index', compact('paymentMethods'));
    // }

    public function index()
    {
        $paymentMethods = PaymentMethod::all();
        return view('Admin.pages.payment_methods.index', compact('paymentMethods'));
    }

    public function create()
    {
        return view('Admin.pages.payment_methods.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'method' => 'required|string|max:255|unique:payment_methods',
        ]);

        PaymentMethod::create($request->all());

        return redirect()->route('paymentmethods.index')
            ->with('success', 'Payment method created successfully.');
    }

    public function edit(PaymentMethod $paymentmethod)
    {
        return view('Admin.pages.payment_methods.edit', compact('paymentmethod'));
    }
    public function show(PaymentMethod $paymentmethod)
    {
        return view('Admin.pages.payment_methods.show', compact('paymentmethod'));
    }

    public function update(Request $request, PaymentMethod $paymentmethod)
    {
        $request->validate([
            'method' => 'required|string|max:255|unique:payment_methods,method,' . $paymentmethod->id,
        ]);

        $paymentmethod->update($request->all());

        return redirect()->route('paymentmethods.index')
            ->with('success', 'Payment method updated successfully');
    }

    public function destroy(PaymentMethod $paymentmethod)
    {
        $paymentmethod->delete();

        return redirect()->route('paymentmethods.index')
            ->with('success', 'Payment method deleted successfully');
    }
}
