<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::all();
        return view('admins.index', compact('admins'));
    }


    public function create()
    {
        return view('admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'admin_role' => 'required',
        ]);
    
        Admin::create([
            'username' => $request->username,
            'admin_role' => 'SubAdmin', // This line can be changed to use the request input if needed
            'password' => Hash::make($request->password),
        ]);
    
        return redirect()->route('admins.index')->with('success', 'Admin created successfully.');
    }

    public function edit(Admin $admin)
    {
        return view('admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'username' => 'required|unique:admins,username,' . $admin->id,
            'admin_role' => 'required',
        ]);
        $data = [
            'username' => $request->username,
            'admin_role' => $request->admin_role,
        ];
        if ($request->filled('password')) {
            if (!Hash::check($request->password, $admin->password)) {
                $data['password'] = Hash::make($request->password);
            }
        
        $admin->update($data);
        return redirect()->route('admins.index')->with('success', 'Admin updated successfully.');
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();

        return redirect()->route('admins.index')->with('success', 'Admin deleted successfully.');
    }
}
