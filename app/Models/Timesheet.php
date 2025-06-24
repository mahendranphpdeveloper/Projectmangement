<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id', 'date', 'task_detail', 'project_name', 
        'starting_time', 'ending_time', 'task_status'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
