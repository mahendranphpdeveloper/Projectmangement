<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Attendance;
use App\Models\Designation;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class EmployeeControl extends Controller
{

    public function index()
    {
        $designations = Designation::all();
       
        $employees = Employee::with('designation')->leftjoin('admins', 'admins.id', '=', 'employees.login_id')
        ->select('employees.*', 'admins.username as login_email')
        ->get();
    
        return view('employee.list', compact('designations', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addCredit(Request $req)
    {
        $validatedData = $req->validate([
            'employeeId' => 'required|exists:employees,id', 
            'email' => 'required|email|unique:admins,username', 
            'password' => 'required|min:6', 
        ]);
    
        $validatedData['password'] = Hash::make($validatedData['password']);
    
        try {
            $employee = new Admin;
            $employee->username = $validatedData['email'];
            $employee->admin_role = 'Employee'; // Assign a default role
            $employee->password = $validatedData['password'];
            $employee->save(); // Save the admin record
    
            $newEmployeeId = $employee->id;
            Employee::where('id', $validatedData['employeeId'])->update(['login_id' => $newEmployeeId]);
    
            return redirect()->back()->with('success', 'Credentials added successfully!');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] === 1062) {
                return redirect()->back()->withErrors(['email' => 'The email has already been taken.']);
            }
            return redirect()->back()->withErrors(['error' => 'An unexpected error occurred while adding credentials.']);
        }
    }
    
    public function updateCredit(Request $req)
    {
        Log::info("ddddd");
        Log::info($req->all());
        $validatedData = $req->validate([
            'email' => 'required|email|unique:admins,username,' . $req->input('adminId'),
            'password' => 'nullable|min:6',
            'adminId' => 'required',
        ]);        
    
        $update = [ 'username' => $validatedData['email'], ];
        if(isset($req->password)){
            $update['password'] = Hash::make($validatedData['password']);
        }
        
        Admin::where('id', $validatedData['adminId'])->update($update);
        return redirect()->back()->with([
            'success' => 'Credentials updated successfully!',
        ]);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required',
            'personal_email' => 'required|email|unique:employees',
            'office_email' => 'required|email|unique:employees,office_email|max:255',
            'gender' => 'required|in:male,female,other',
            'dob' => 'required|date|before:today',
            'joining_date' => 'required|date|after_or_equal:dob',
            'designation' => 'required|exists:designations,id',
            'address' => 'required|string',
            'bank_name' => 'required|string|max:255',
            'account_no' => 'required|string|unique:employees,account_no|max:20',
            'ifsc' => 'required|string|max:11',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_proof' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);
    
        // Create a new Employee instance
        $employee = new Employee();
        $employee->name = $validatedData['name'];
        $employee->phone = $validatedData['phone'];
        $employee->personal_email = $validatedData['personal_email'];
        $employee->office_email = $validatedData['office_email'];
        $employee->gender = $validatedData['gender'];
        $employee->dob = $validatedData['dob'];
        $employee->joining_date = $validatedData['joining_date'];
        $employee->designation_id = $validatedData['designation'];
        $employee->address = $validatedData['address'];
        $employee->bank_name = $validatedData['bank_name'];
        $employee->account_no = $validatedData['account_no'];
        $employee->ifsc = $validatedData['ifsc'];
    
        // Handle file uploads
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $employee->photo = $photoPath;
        }
    
        if ($request->hasFile('id_proof')) {
            $idProofPath = $request->file('id_proof')->store('id_proofs', 'public');
            $employee->id_proof = $idProofPath;
        }
    
        // Save the employee record
        $employee->save();
    
        // Return JSON response for AJAX requests
        return response()->json(['success' => 'Employee added successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::findOrFail($id);
        return response()->json($employee);
    } 

    public function EmployeeLeave()
    {
        $id = session('employee_id') ?? null;
        $employee = Employee::findOrFail($id);
        $attendances = Attendance::with('employee')->where('employee_id', $id)->get();
        // dd(compact('employee','attendances'));
        return view('employee.attendance', compact('employee','attendances'));
    } 
    public function EmployeeLeaveApply()
    {
        return view('employee.leave-form');
    } 

    public function show2(string $id)
    {
        $employee = Employee::with('designation')->findOrFail($id);
        return view('employee.show', compact('employee'));
    }
    public function profile()
    {
        $user = Auth::user();
        $employee = Employee::with('designation')
            ->join('admins', 'admins.id', '=', 'employees.login_id')
            ->select('employees.*', 'admins.username as login_email')
            ->where('admins.id', $user->id)
            ->firstOrFail();  
        return view('employee.view', compact('employee'));
    }
    
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);  
        return response()->json($employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required',
            'personal_email' => 'required|email',
            'office_email' => 'required|email|max:255',
            'gender' => 'required|in:male,female,other',
            'dob' => 'required|date|before:today',
            'joining_date' => 'required|date|after_or_equal:dob',
            'designation' => 'required|exists:designations,id',
            'address' => 'required|string',
            'bank_name' => 'required|string|max:255',
            'account_no' => 'required|string|max:20',
            'ifsc' => 'required|string|max:11',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_proof' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->name = $validatedData['name'];
        $employee->phone = $validatedData['phone'];
        $employee->personal_email = $validatedData['personal_email'];
        $employee->office_email = $validatedData['office_email'];
        $employee->gender = $validatedData['gender'];
        $employee->dob = $validatedData['dob'];
        $employee->joining_date = $validatedData['joining_date'];
        $employee->designation_id = $validatedData['designation'];
        $employee->address = $validatedData['address'];
        $employee->bank_name = $validatedData['bank_name'];
        $employee->account_no = $validatedData['account_no'];
        $employee->ifsc = $validatedData['ifsc'];

        if ($request->hasFile('photo')) {
            if ($employee->photo) {
                Storage::disk('public')->delete($employee->photo);
            }
            $employee->photo = $request->file('photo')->store('photos', 'public');
        }

        if ($request->hasFile('id_proof')) {
            if ($employee->id_proof) {
                Storage::disk('public')->delete($employee->id_proof);
            }
            $employee->id_proof = $request->file('id_proof')->store('id_proofs', 'public');
        }

        // Save the updated employee record
        $employee->save();

        // Return JSON response for AJAX requests
        return response()->json(['success' => 'Employee updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        // Log::info("message");
        // Log::info($employee);

        $employee->delete();
        // Return JSON response for AJAX requests
        return response()->json(['success' => 'Employee deleted successfully.']);
    }
}
