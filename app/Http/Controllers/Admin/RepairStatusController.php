<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RepairStatus;
use Illuminate\Http\Request;

class RepairStatusController extends Controller
{
    public function index()
    {
        $repairStatuses = RepairStatus::all();
        return view('Admin.pages.repairstatuses.index', compact('repairStatuses'));
    }

    public function create()
    {
        return view('Admin.pages.repairstatuses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|string|max:255',
        ]);

        RepairStatus::create($request->all());

        return redirect()->route('repairstatuses.index')
            ->with('success', 'Repair status created successfully.');
    }

    public function edit(RepairStatus $repairstatus)
    {
        return view('Admin.pages.repairstatuses.edit', compact('repairstatus'));
    }

    public function update(Request $request, RepairStatus $repairstatus)
    {
        $request->validate([
            'status' => 'required|string|max:255',
        ]);

        $repairstatus->update($request->all());

        return redirect()->route('repairstatuses.index')
            ->with('success', 'Repair status updated successfully');
    }

    public function destroy(RepairStatus $repairstatus)
    {
        $repairstatus->delete();

        return redirect()->route('repairstatuses.index')
            ->with('success', 'Repair status deleted successfully');
    }
}
