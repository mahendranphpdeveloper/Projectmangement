<?php

namespace App\Http\Controllers;

use App\Models\RecentProject;
use App\Models\RecentProjectContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RecentProjectController extends Controller
{
    public function index($id)
    {
        $projects = RecentProject::where('parent_id',$id)->get();
        return response()->json($projects);
    }
    public function show($id)
    {
        $project = RecentProject::find($id);
            if (!$project) {
            return response()->json(['success' => false, 'message' => 'Project not found.'], 404);
        }
            return response()->json(['success' => true, 'project' => $project]);
    }
    

    public function store(Request $request)
    {       
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'required',
            'description' => 'required',
            'link' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/project_images', $imageName);
            $validated['image'] = $imageName;
        }
        $id = $request->parent_id;
        $record = RecentProject::Create( 
            $validated 
        );

        return response()->json(['success' => true]);
    }

    public function update(Request $request, $id)
    {
        $project = RecentProject::find($id);

        // Log::info("yesssssssss");
        // Log::info($id);
        $validated = $request->validate([
            'parent_id' => 'required',
            'name' => 'required|string|max:255',
            'description' => 'required',
            'link' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/project_images', $imageName);
            $validated['image'] = $imageName;
        }
        $id2 = $request->id;
        $record = RecentProject::updateOrCreate(['id' => $id], 
        $validated 
    );

        return response()->json(['success' => true]);
    }

    public function contentUpdate(Request $req){
        Log::info("varuthuuuu");
        Log::info($req->all());
        $validated = $req->validate([
            'parent_id' => 'required',
            'content' => 'required'
        ]);
        $id = $req->parent_id;
        $record = RecentProjectContent::updateOrCreate(['parent_id' => $id], 
        $validated 
    );
    return response()->json(['success' => true]);
}
    public function destroy($id)
    {
        $project = RecentProject::find($id);
        $project->delete();

        return response()->json(['success' => true]);
    }
}
