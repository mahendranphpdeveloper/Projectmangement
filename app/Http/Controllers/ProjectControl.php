<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Module;
use App\Models\Project;
use App\Models\projectLog;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ProjectControl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('created_at','desc')->get();
        $employees = Employee::all();
        $services = Service::orderBy('sortOrder', 'asc')->get();
        return view('project.index', compact('projects','employees','services'));
    }
    public function addProject()
    {
        $projects = Project::orderBy('created_at','desc')->get();
        $employees = Employee::all();
        $services = Service::orderBy('sortOrder', 'asc')->get();
        return view('project.add-project', compact('projects','employees','services'));
    }

    public function employeeProject()
    {
        $user = Auth::user();
        $employee_id = session('employee_id') ?? null;
        $projects = collect();
        if ($user->admin_role == 'Employee') {
            $projects = Project::whereHas('employees', function ($query) use ($employee_id) {
                    $query->where('employees.id', $employee_id);  
                })
                ->with(['module' => function ($query) use ($employee_id) {
                    $query->where('employee_id', $employee_id);
                }])
                ->orderBy('created_at', 'desc')
                ->get();
        }
        return view('project.employee-project',['projects' => $projects]);
            
}
public function startProject(Request $request)
{
    $employee = Auth::user();
    $project = Project::findOrFail($request->project_id);
    $employee_id = session('employee_id') ?? null;

    // Log the project start time
    $log = ProjectLog::create([
        'employee_id' => $employee_id,
        'project_id' => $project->id,
        'start_time' => now(),
        'end_time' => null, // Will be set when the project is stopped
    ]);

    return response()->json(['message' => 'Project started successfully']);
}

public function stopProject(Request $request)
{
    $projectLog = ProjectLog::where('project_id', $request->project_id)
                            ->where('end_time', null) // Ensure we stop the correct project log
                            ->first();

    if ($projectLog) {
        $projectLog->update([
            'end_time' => now(), // Set the stop time
        ]);

        return response()->json(['message' => 'Project stopped successfully']);
    } else {
        return response()->json(['message' => 'No active project found to stop'], 404);
    }
}

public function startModule(Request $request)
{
    $employee = Auth::user();
    $module = Module::findOrFail($request->module_id);
    $employee_id = session('employee_id') ?? null;
    $log = ProjectLog::create([
        'employee_id' => $employee_id,
        'project_id' => $module->project_id,
        'module_id' => $module->id,
        'start_time' => now(),
        'end_time' => null,
    ]);

    return response()->json(['message' => 'Module started successfully']);
}

public function stopModule(Request $request)
{
    $moduleLog = ProjectLog::where('module_id', $request->module_id)
                            ->where('end_time', null) 
                            ->first();

    if ($moduleLog) {
        $moduleLog->update([
            'end_time' => now(), // Set the stop time
        ]);

        return response()->json(['message' => 'Module stopped successfully']);
    } else {
        return response()->json(['message' => 'No active module found to stop'], 404);
    }
}



    public function create()
    {
        return view('project.create');
    }
    public function show($id)
    {
        $project = Project::find($id);
        return view('project.show', compact('project'));
    }
    public function store(Request $request)
    {
       Log::info($request->all());
        $validatedData = $request->validate([
            'pro_name' => 'required|string|max:255',
            'pro_type' => 'required|string|max:255',
            'pro_budget' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'client_name' => 'required|string|max:255',
            'client_email' => 'required|email',
            'client_phone' => 'required|string',
            'client_address' => 'required|string',
            'pro_status' => 'string',
            'review_date' => 'nullable|date',
            'proof' => 'nullable|file|mimes:jpg,png,pdf,doc,docx|max:2048',
        ]);

        $proofPath = null;
        if ($request->hasFile('proof')) {
            $proofFile = $request->file('proof');
            $proofFileName = time() . '_' . $proofFile->getClientOriginalName();
            $proofPath = 'project_doc/' . $proofFileName;
            $proofFile->move(public_path('project_doc'), $proofFileName);
        }
    
        // Create the project record
        $project = Project::create(array_merge($validatedData, ['proof' => $proofPath]));
    
        // Sync employees with the project
        $employeeIds = json_decode($request->employee_id); // Ensure it’s a JSON array of employee IDs
        $project->employees()->sync($employeeIds);
    
        return redirect()->route('project.index')->with('success', 'Project created successfully.');
    }
    
    

    // Show form to edit a project
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('project.edit', compact('project'));
    }

    public function upgrade(Request $request)
    {
        // Log::info("message");
        // Log::info($request->all());
        try {
            $validatedData = $request->validate([
                'pro_name' => 'required|string|max:255',
                'pro_type' => 'required|string|max:255',
                'pro_budget' => 'required|numeric',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'client_name' => 'required|string|max:255',
                'client_email' => 'required|email',
                'client_phone' => 'required|string',
                'client_address' => 'required|string',
                'pro_status' => 'nullable|string',
                'review_date' => 'nullable|date',
            ]);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator->errors()) 
                ->withInput();
        }

        $id = $request->id;
        $project = Project::findOrFail($id);

     
        if ($request->hasFile('proof')) {
            // Delete old proof if it exists
            if ($project->proof && file_exists(public_path($project->proof))) {
                unlink(public_path($project->proof)); // Remove the old file
            }

            $proofFile = $request->file('proof');
            $proofFileName = time() . '_' . $proofFile->getClientOriginalName();
            $proofPath = 'project_doc/' . $proofFileName;
            $proofFile->move(public_path('project_doc'), $proofFileName);
            $validatedData['proof'] = $proofPath; // Update the proof path
        }

        // dd($validatedData);
        $project->update($validatedData);

        // Sync employees with the project
        $employeeIds = json_decode($request->employee_id); // Get the JSON array of employee IDs
        $project->employees()->sync($employeeIds); // Sync associated employees

        return redirect()->back()->with('success', 'Project updated successfully.');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('project.index')->with('success', 'Project deleted successfully.');
    }
}