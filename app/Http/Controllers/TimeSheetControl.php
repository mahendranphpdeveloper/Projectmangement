<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Timesheet;
use Illuminate\Http\Request;

class TimeSheetControl extends Controller
{
    public function index()
    {
        $timesheets = Timesheet::with('employee')->get();
        return view('timesheets.index', compact('timesheets'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('timesheets.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'task_detail' => 'required|string|max:255',
            'project_name' => 'required|string|max:255',
            'starting_time' => 'required|date_format:H:i',
            'ending_time' => 'required|date_format:H:i',
            'task_status' => 'required|in:pending,completed,in-progress',
        ]);

        Timesheet::create($request->all());

        return redirect()->route('employee.timesheet')->with('success', 'Timesheet created successfully.');
    }

    // Add additional methods for edit, update, delete as needed
}
