<?php 

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Attendance;
use App\Models\Employee; // Assuming you have an Employee model
use Carbon\Carbon;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all employees
        $employees = Employee::all();

        // Get the first and last day of the previous month
        $firstDayOfLastMonth = Carbon::now()->subMonth()->startOfMonth();
        $lastDayOfLastMonth = Carbon::now()->subMonth()->endOfMonth();

        // Loop through each day of the previous month
        for ($date = $firstDayOfLastMonth; $date->lte($lastDayOfLastMonth); $date->addDay()) {
            // Randomize check-in time (for example, between 8:00 AM and 9:30 AM)
            $randomHour = rand(8, 9); // Random hour between 8 and 9
            $randomMinute = rand(0, 59); // Random minute
            $currentTime = sprintf('%02d:%02d:00', $randomHour, $randomMinute);

            foreach ($employees as $employee) {
                // Check if attendance already exists for the employee on that date
                $attendance = Attendance::where('employee_id', $employee->id)
                    ->whereDate('attendance_date', $date->format('Y-m-d'))
                    ->first();

                // Create attendance record if it does not exist
                if (!$attendance) {
                    Attendance::create([
                        'employee_id' => $employee->id,
                        'attendance_date' => $date->format('Y-m-d'),
                        'check_in' => $currentTime,
                    ]);
                }
            }
        }
    }
}
