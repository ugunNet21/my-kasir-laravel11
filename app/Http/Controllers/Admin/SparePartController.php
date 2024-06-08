<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SparePart;
use Illuminate\Http\Request;

class SparePartController extends Controller
{
    public function index()
    {
        $spareParts = SparePart::all();
        return view('Admin.pages.spareparts.index', compact('spareParts'));
    }

    public function create()
    {
        return view('Admin.pages.spareparts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cost_price' => 'required|numeric|min:0',
            'sale_price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
        ]);

        SparePart::create($request->all());
        // dd($request);

        return redirect()->route('spareparts.index')
            ->with('success', 'Spare part created successfully.');
    }

    public function edit(SparePart $sparepart)
    {
        return view('Admin.pages.spareparts.edit', compact('sparepart'));
    }

    public function update(Request $request, SparePart $sparepart)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cost_price' => 'required|numeric|min:0',
            'sale_price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
        ]);

        $sparepart->update($request->all());

        return redirect()->route('spareparts.index')
            ->with('success', 'Spare part updated successfully');
    }

    public function destroy(SparePart $sparepart)
    {
        $sparepart->delete();

        return redirect()->route('spareparts.index')
            ->with('success', 'Spare part deleted successfully');
    }
}
