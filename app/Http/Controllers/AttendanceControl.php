<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Leave;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceControl extends Controller
{
    public function index($id)
    {
        $attendances = Attendance::with('employee')->where('employee_id', $id)->get();
    
        $monthlyAttendanceCount = Attendance::selectRaw('YEAR(attendance_date) as year, MONTH(attendance_date) as month, COUNT(*) as total, SUM(CASE WHEN check_in IS NOT NULL THEN 1 ELSE 0 END) as present_count')
            ->where('employee_id', $id)
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();
    
        foreach ($monthlyAttendanceCount as $attendance) {
            $attendance->absent_count = $attendance->total - $attendance->present_count;
    
            $attendance->leave_count = Leave::where('employee_id', $id)
                ->whereYear('leave_date', $attendance->year)
                ->whereMonth('leave_date', $attendance->month)
                ->count();
    
            $attendance->total_working_days = cal_days_in_month(CAL_GREGORIAN, $attendance->month, $attendance->year);
            $attendance->sunday_count = $this->countSundays($attendance->year, $attendance->month);
        }
    //    dd($monthlyAttendanceCount);
        return view('attendances.index', compact('attendances', 'monthlyAttendanceCount'));
    }
    
    private function countSundays($year, $month)
    {
        $sundayCount = 0;
    
        // Loop through each day of the month
        for ($day = 1; $day <= cal_days_in_month(CAL_GREGORIAN, $month, $year); $day++) {
            // If the day is a Sunday (0 in PHP's date function)
            if (date('w', strtotime("$year-$month-$day")) == 0) {
                $sundayCount++;
            }
        }
    
        return $sundayCount;
    }
    
    
    
    public function checkIn(Request $request)
    {
        $request->validate(['employee_id' => 'required|exists:employees,id']);
    
        Attendance::create([
            'employee_id' => $request->employee_id,
            'attendance_date' => today(),
            'check_in' => now(),
        ]);
    
        return redirect()->back()->with('success', 'Checked in successfully!');
    }
    

    public function applyLeave(Request $request)
    {
        dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required',
            'personal_email' => 'required|email|unique:employees',
            'office_email' => 'required|email|unique:employees,office_email|max:255',
            'gender' => 'required|in:male,female,other'
        ]);
        return redirect()->back()->with('success', 'Checked in successfully!');
    }
    

    public function checkOut(Request $request, $id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->check_out = now();
        $attendance->save();
        return redirect()->back()->with('success', 'Checked out successfully!');
    }
    
    
}
