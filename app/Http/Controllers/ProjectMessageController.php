<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Module;
use App\Models\Project;
use App\Models\ProjectMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProjectMessageController extends Controller
{
    public function store(Request $request)
    {
        try {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'messageType' => 'required|string',
            'messageText' => 'nullable|string',
            'document' => 'nullable|file|mimes:pdf,doc,docx,txt',
            'image' => 'nullable|file|mimes:jpeg,png,jpg',
            'video' => 'nullable|file|mimes:mp4,mov,avi|max:51200',
            'audio' => 'nullable|file|mimes:mp3,wav'
        ]);
                        $employee_id = session('employee_id')??null;
                        $projectMessage = new ProjectMessage;
                        $projectMessage->project_id = $validated['project_id'];
                        $projectMessage->employee_id = $employee_id;
                        $projectMessage->message_type = $validated['messageType'];
                        $projectMessage->message = $validated['messageText'] ?? null;

                        $proofPath = null;
                        if ($request->hasFile('document')) {
                            $proofFile = $request->file('document');
                            $proofFileName = time() . '_' . $proofFile->getClientOriginalName();
                            $proofPath = 'project_documents/' . $proofFileName;
                            // Move the file to the public folder
                            $proofFile->move(public_path('project_documents'), $proofFileName);
                        }

                        if ($request->hasFile('image')) {
                            $proofFile = $request->file('image');
                            $proofFileName = time() . '_' . $proofFile->getClientOriginalName();
                            $proofPath = 'project_documents/' . $proofFileName;
                            // Move the file to the public folder
                            $proofFile->move(public_path('project_documents'), $proofFileName);
                        }

                        if ($request->hasFile('audio')) {
                            $proofFile = $request->file('audio');
                            $proofFileName = time() . '_' . $proofFile->getClientOriginalName();
                            $proofPath = 'project_documents/' . $proofFileName;
                            // Move the file to the public folder
                            $proofFile->move(public_path('project_documents'), $proofFileName);
                        }

                        if ($request->hasFile('video')) {
                            $proofFile = $request->file('video');
                            $proofFileName = time() . '_' . $proofFile->getClientOriginalName();
                            $proofPath = 'project_documents/' . $proofFileName;
                            // Move the file to the public folder
                            $proofFile->move(public_path('project_documents'), $proofFileName);
                        }

        // Save the file path to the database
        $projectMessage->document = $proofPath;
        $projectMessage->save();

        return response()->json(['success' => true, 'message' => 'Message saved successfully']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
    }
    }
    public function getAssignedEmployees(Project $project)
    {
        $assignedEmployeeIds = $project->employees->pluck('id'); 
        return response()->json(['assignedEmployees' => $assignedEmployeeIds]);
    }
    
    public function show($id)
    {
        $message = ProjectMessage::findOrFail($id);
        return response()->json($message);
    }
    public function projectAssign()
    {
        $employees = Employee::with('projects')->get();
        return view('project.assign', compact('employees'));
    }
    public function modulesAssign(Request $request)
    {
        $moduleId = $request->input('module_id');
        $isChecked = filter_var($request->input('is_checked'), FILTER_VALIDATE_BOOLEAN); 
        $projectId = $request->input('project_id');
        $employeeId = $request->input('employee_id');
        
        $module = Module::find($moduleId);
                
        if ($module) {
            if ($isChecked && $module->employee_id == $employeeId) {
                return response()->json(['message' => 'Module already assigned to this employee'], 400);
            }
    
            if ($isChecked) {
                $module->employee_id = $employeeId;
                $module->save();
            return response()->json(['message' => 'Module assigned to employee']);
            } else {
                $module->employee_id = null;        
                $module->save();
            return response()->json(['message' => 'Module unassigned to employee!']);
            }

        }
    
        return response()->json(['message' => 'Module not found'], 404);
    }
    
    
    
    public function assignEmployees(Request $request, $id)
    {
        try {
            $request->validate([
                'project_id' => 'required|exists:projects,id',   
                'employee_ids' => 'array',                       
                'employee_ids.*' => 'nullable|exists:employees,id', 
            ]);
            
    
            $pro_id = $request->project_id;
            $project = Project::findOrFail($pro_id);
    
            if (empty($request->employee_ids) || (count($request->employee_ids) == 1 && $request->employee_ids[0] == 0)) {
                $project->employees()->detach();  
                return response()->json([
                    'success' => true,
                    'message' => 'All employee assignments removed from the project.',
                ], 200);
            }
    
            $project->employees()->sync($request->employee_ids);
    
            return response()->json([
                'success' => true,
                'message' => 'Employees assigned successfully to the project.',
            ], 200);
    
        } catch (\Exception $e) {
            Log::error("Error assigning employees to project: " . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error assigning employees: ' . $e->getMessage(),
            ], 400);
        }
    }
    

    public function update(Request $request, $id)
    {
        $projectMessage = ProjectMessage::findOrFail($id);
        
        $validated = $request->validate([
            'messageType' => 'required|string',
            'messageText' => 'nullable|string',
            'document' => 'nullable|file|mimes:pdf,doc,docx,txt',
            'image' => 'nullable|file|mimes:jpeg,png,jpg',
            'video' => 'nullable|file|mimes:mp4,mov,avi',
            'audio' => 'nullable|file|mimes:mp3,wav'
        ]);

        $projectMessage->message_type = $validated['messageType'];
        $projectMessage->message = $validated['messageText'] ?? null;

        $proofPath = null;
                        if ($request->hasFile('document')) {
                            $proofFile = $request->file('document');
                            $proofFileName = time() . '_' . $proofFile->getClientOriginalName();
                            $proofPath = 'project_documents/' . $proofFileName;
                            // Move the file to the public folder
                            $proofFile->move(public_path('project_documents'), $proofFileName);
                        }

                        if ($request->hasFile('image')) {
                            $proofFile = $request->file('image');
                            $proofFileName = time() . '_' . $proofFile->getClientOriginalName();
                            $proofPath = 'project_documents/' . $proofFileName;
                            // Move the file to the public folder
                            $proofFile->move(public_path('project_documents'), $proofFileName);
                        }

                        if ($request->hasFile('audio')) {
                            $proofFile = $request->file('audio');
                            $proofFileName = time() . '_' . $proofFile->getClientOriginalName();
                            $proofPath = 'project_documents/' . $proofFileName;
                            // Move the file to the public folder
                            $proofFile->move(public_path('project_documents'), $proofFileName);
                        }

                        if ($request->hasFile('video')) {
                            $proofFile = $request->file('video');
                            $proofFileName = time() . '_' . $proofFile->getClientOriginalName();
                            $proofPath = 'project_documents/' . $proofFileName;
                            // Move the file to the public folder
                            $proofFile->move(public_path('project_documents'), $proofFileName);
                        }

        // Save the file path to the database
        $projectMessage->document = $proofPath;

        $projectMessage->save();

        return response()->json(['success' => true, 'message' => 'Message updated successfully']);
    }

    public function destroy($id)
    {
        $projectMessage = ProjectMessage::findOrFail($id);
        if ($projectMessage->document) {
            Storage::delete($projectMessage->document);
        }
        $projectMessage->delete();

        return response()->json(['success' => true, 'message' => 'Message deleted successfully']);
    }
}

