<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Module;
use App\Models\Task;
use App\Models\TaskLog;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class TaskController extends Controller
{

    public function manage(Project $project)
    {
        Log::info($project);
        $modules = $project->module()->with('tasks')->get();
        return view('tasks.manage', compact('project', 'modules'));
    }

    public function index(Module $module)
    {
        $tasks = $module->tasks()->get();
        return response()->json($tasks);
    }

    public function show(Task $task)
    {
        return response()->json($task);
    }

    public function store(Request $request, Module $module)
    {
        $validated = $request->validate([
            'task_name' => 'required|string|max:255',
            'task_description' => 'nullable|string',
            'task_status' => 'required|in:Pending,In Progress,Completed,On Hold',
            'start_date' => 'nullable|date_format:m/d/Y',
            'due_date' => 'nullable|date_format:m/d/Y|after_or_equal:start_date',
        ]);

        $taskData = [
            'project_module_id' => $module->id,
            'task_name' => $validated['task_name'],
            'task_description' => $validated['task_description'],
            'task_status' => $validated['task_status'],
            'start_date' => $validated['start_date'] ? Carbon::createFromFormat('m/d/Y', $validated['start_date'])->format('Y-m-d') : null,
            'due_date' => $validated['due_date'] ? Carbon::createFromFormat('m/d/Y', $validated['due_date'])->format('Y-m-d') : null,
        ];

        $task = Task::create($taskData);

        return response()->json([
            'success' => true,
            'task' => $task,
            'message' => 'Task created successfully.'
        ]);
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'task_name' => 'required|string|max:255',
            'task_description' => 'nullable|string',
            'task_status' => 'required|in:Pending,In Progress,Completed,On Hold',
            'start_date' => 'nullable|date_format:m/d/Y',
            'due_date' => 'nullable|date_format:m/d/Y|after_or_equal:start_date',
        ]);

        $taskData = [
            'task_name' => $validated['task_name'],
            'task_description' => $validated['task_description'],
            'task_status' => $validated['task_status'],
            'start_date' => $validated['start_date'] ? Carbon::createFromFormat('m/d/Y', $validated['start_date'])->format('Y-m-d') : null,
            'due_date' => $validated['due_date'] ? Carbon::createFromFormat('m/d/Y', $validated['due_date'])->format('Y-m-d') : null,
        ];

        $task->update($taskData);

        return response()->json([
            'success' => true,
            'task' => $task,
            'message' => 'Task updated successfully.'
        ]);
    }


    public function edit($moduleId, $taskId)
    {
        $task = Task::where('project_module_id', $moduleId)->findOrFail($taskId);

        return response()->json($task);
    }
    public function destroy(Task $task)
    {

        Log::info('asda');
        $task->delete();

        return response()->json([
            'success' => true,
            'message' => 'Task deleted successfully.'
        ]);
    }



    public function startTask(Request $request)
    {
        $task = Task::findOrFail($request->task_id);
        $task->status = 'Started';
        $task->save();

        TaskLog::create([
            'task_id' => $task->id,
            'start_time' => now(),
        ]);

        return response()->json(['success' => true, 'message' => 'Task started successfully']);
    }

    public function stopTask(Request $request)
    {
        $task = Task::findOrFail($request->task_id);
        $task->status = 'Stopped';
        $task->save();

        $log = TaskLog::where('task_id', $task->id)
            ->whereNull('end_time')
            ->latest()
            ->first();
        if ($log) {
            $log->end_time = now();
            $log->duration = $log->end_time->diffInSeconds($log->start_time);
            $log->save();
        }

        return response()->json(['success' => true, 'message' => 'Task stopped successfully']);
    }

    public function pauseTask(Request $request)
{
    $task = Task::findOrFail($request->task_id);
    if ($task->status !== 'Started') {
        return response()->json(['error' => 'Task is not started.'], 400);
    }

    $task->status = 'Paused';
    $task->save();

    $log = TaskLog::where('task_id', $task->id)
                  ->whereNull('end_time')
                  ->latest()
                  ->first();
    if ($log) {
        $log->status = 'paused';
        $log->duration = now()->diffInSeconds($log->start_time);
        $log->save();
    }

    return response()->json(['success' => true, 'message' => 'Task paused successfully']);
}

public function resumeTask(Request $request)
{
    $task = Task::findOrFail($request->task_id);
    if ($task->status !== 'Paused') {
        return response()->json(['error' => 'Task is not paused.'], 400);
    }

    $task->status = 'Started';
    $task->save();

    $log = TaskLog::where('task_id', $task->id)
                  ->where('status', 'paused')
                  ->latest()
                  ->first();
    if ($log) {
        $log->status = 'running';
        $log->start_time = now();
        $log->duration = 0;
        $log->save();
    } else {
        TaskLog::create([
            'task_id' => $task->id,
            'start_time' => now(),
            'status' => 'running',
        ]);
    }

    return response()->json(['success' => true, 'message' => 'Task resumed successfully']);
}
}
