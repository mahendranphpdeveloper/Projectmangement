<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Project;
use App\Models\ProjectControls;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $employee_id = session('employee_id')??null;
        if ($user->admin_role == 'Employee') {
            $projects = Project::whereHas('employees', function ($query) use ($employee_id) {
                $query->where('employees.id', $employee_id);  
            })
            ->orderBy('created_at', 'desc')
            ->get();
        // dd( $projects );
            $projectControls = ProjectControls::whereIn('project_id', $projects->pluck('id'))
                ->orderBy('created_at', 'desc')
                ->get();
        }
        else{
            $projects = Project::all();
            $projectControls = ProjectControls::orderBy('created_at','desc')->get();
        }
        $projectControlIds = ProjectControls::pluck('project_id')->toArray();
        $notChoosedProjects = Project::whereNotIn('id', $projectControlIds)->get();
        return view('back-end.index', compact('projects', 'projectControls', 'notChoosedProjects'));
    }
    public function store2(Request $request)
    {
        try {
            $request->validate([
                'project_id' => 'required',
                'pro_name' => 'required|string',
                'pro_link' => 'required|url',
                'pro_image' => 'nullable|file|mimes:jpeg,png,jpg',
            ]);
    
            $projectcontrol = new ProjectControls;
            $projectcontrol->pro_name = $request->pro_name;
            $projectcontrol->project_id = $request->project_id;
            $projectcontrol->pro_link = $request->pro_link;
    
            if ($request->hasFile('pro_image')) {
                $proofFile = $request->file('pro_image');
                $proofFileName = time() . '_' . $proofFile->getClientOriginalName();
                $proofFile->move(public_path('project_documents'), $proofFileName);
                $projectcontrol->pro_image = 'project_documents/' . $proofFileName;
            }
    
            $projectcontrol->save();
            
            return redirect()->back()->with('success', 'Project saved successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    
    
    public function index2()
    {
        
        return view('back-end.sub-menu');
    }
    public function menu()
    {
        die;
        return view('back-end.menu');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'project_id' => 'required',
                'pro_name' => 'required|string',
                'pro_link' => 'required|url',
                'pro_image' => 'nullable|file|mimes:jpeg,png,jpg',
            ]);
    
            $projectcontrol = ProjectControls::findOrFail($id);
            $projectcontrol->project_id = $request->project_id;
            $projectcontrol->pro_name = $request->pro_name;
            $projectcontrol->pro_link = $request->pro_link;
    
            if ($request->hasFile('pro_image')) {
                if ($projectcontrol->pro_image && file_exists(public_path($projectcontrol->pro_image))) {
                    unlink(public_path($projectcontrol->pro_image));
                }
                $proofFile = $request->file('pro_image');
                $proofFileName = time() . '_' . $proofFile->getClientOriginalName();
                $proofFile->move(public_path('project_documents'), $proofFileName);
                $projectcontrol->pro_image = 'project_documents/' . $proofFileName;
            }
            $projectcontrol->save();
            
            return redirect()->back()->with('success', 'Project updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        // dd();
        $employee = ProjectControls::findOrFail($id);
        $employee->delete();
        return redirect()->back()->with('success', 'Project deleted successfully.');
    }


    public function login(Request $request)
    {
        
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::guard('admin')->user();
            $employee = Employee::with('designation')
            ->where('login_id', $user->id)
            ->first();
                if ($employee) {
                    session([
                        'employee_id' => $employee->id,
                        'employee_name' => $employee->name,
                        'employee_email' => $employee->personal_email,
                        'employee_designation' => $employee->designation->position_title ?? 'N/A',
                        'employee_id' => $employee->id,
                    ]);
                } 
            $this->markAttendance($user);
            return redirect()->intended('/admin/dashboard');
        }
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }
    public function logout()
    {
        $user = Auth::guard('admin')->user();
        if ($user) {
            $this->markCheckOut($user); 
        }
        Auth::guard('admin')->logout();
        session()->flush();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('admin.loginForm')->with('reload', true);
    }
    public function markAttendance($user){
        $adminId = $user->id;
        $employee = Employee::where('login_id', $adminId)->first();
        if (!$employee) {
            return;
        }
        $employeeId = $employee->id;
        $today = Carbon::now()->format('Y-m-d');
        $currentTime = Carbon::now()->format('H:i:s');
        $attendance = Attendance::where('employee_id', $employeeId)
        ->whereDate('attendance_date', $today)
        ->first();
        
    if (!$attendance) {
        Attendance::create([
            'employee_id' => $employeeId,
            'attendance_date' => $today,
            'check_in' => $currentTime,
        ]);
    } 
}
public function markCheckOut($user)
{
    $adminId = $user->id;
    $employee = Employee::where('login_id', $adminId)->first();
    if (!$employee) {
        return;
    }
    $employeeId = $employee->id;
    $today = Carbon::now()->format('Y-m-d');
    $currentTime = Carbon::now()->format('H:i:s');

    $attendance = Attendance::where('employee_id', $employeeId)
                            ->whereDate('attendance_date', $today)
                            ->first();

    if ($attendance) {
        $attendance->update(['check_out' => $currentTime]);
    }
}
public function createAdmin()
{
    $name = 'jayamweb.developer2@gmail.com';
    $pass = '123456';
    Admin::create([
        'username' => $name,
        'admin_role' => 'Admin',
        'password' => Hash::make($pass),
    ]);

    return redirect()->route('admin.loginForm')->with('success', 'Admin created successfully.');
}
}
