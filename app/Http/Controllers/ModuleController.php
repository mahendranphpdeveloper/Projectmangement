<?php
namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Project;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::all(); // Fetch all modules
        return response()->json($modules);
    }
    public function getModules($projectId)
    {
        $project = Project::findOrFail($projectId);
        return response()->json($project->module); 
    }
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        $module = Module::create([
            'project_id' => $request->project_id,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json($module);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'project_id' => 'required',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        $module = Module::findOrFail($id);
        $module->update([
            'project_id' => $request->project_id,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json($module);
    }

    public function destroy($id)
    {
        $module = Module::findOrFail($id);
        $module->delete();

        return response()->json(['message' => 'Module deleted successfully']);
    }
}
