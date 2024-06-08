<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technician;
use Illuminate\Http\Request;

class TechnicianController extends Controller
{
    public function index()
    {
        $technicians = Technician::all();
        return view('Admin.pages.technicians.index', compact('technicians'));
    }

    public function create()
    {
        return view('Admin.pages.technicians.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:technicians,email',
        ]);

        Technician::create($request->all());

        return redirect()->route('technicians.index')
            ->with('success', 'Technician created successfully.');
    }

    public function edit(Technician $technician)
    {
        return view('Admin.pages.technicians.edit', compact('technician'));
    }

    public function update(Request $request, Technician $technician)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:technicians,email,' . $technician->id,
        ]);

        $technician->update($request->all());

        return redirect()->route('technicians.index')
            ->with('success', 'Technician updated successfully');
    }

    public function destroy(Technician $technician)
    {
        $technician->delete();

        return redirect()->route('technicians.index')
            ->with('success', 'Technician deleted successfully');
    }
}
