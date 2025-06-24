<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function index()
    {
        $designations = Designation::all();
        return view('employee.designation', compact('designations'));
    }

    public function create()
    {
        return view('designation.create');
    }

    public function store(Request $request)
    {
        $req = $request->validate([
            'position_title' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'type' => 'required',
        ]);

        Designation::create($req);

        return redirect()->route('designation.index')
                         ->with('success', 'Designation created successfully.');
    }

    public function show(Designation $designation)
    {
        return view('designation.show', compact('designation'));
    }

    public function edit(Designation $designation)
    {
        return view('designation.edit', compact('designation'));
    }

    public function upgrade(Request $request, $id)
    {
        $req = $request->validate([
            'position_title' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'type' => 'required',
        ]);
        $designation = Designation::findOrFail($id);
        $designation->update($req);
        return redirect()->route('designation.index')
                         ->with('success', 'Designation updated successfully.');
    }
    public function update(Request $request, Designation $designation)
    {
        $request->validate([
            'position_title' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'type' => 'required|in:start,medium,advanced',
        ]);

        $designation->update($request->all());

        return redirect()->route('designation.index')
                         ->with('success', 'Designation updated successfully.');
    }

    public function destroy(Designation $designation)
    {
        $designation->delete();

        return redirect()->route('designation.index')
                         ->with('success', 'Designation deleted successfully.');
    }
}
