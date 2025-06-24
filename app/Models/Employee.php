<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'employees';
    
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id'); // Specify the foreign key
    }
    public function timesheets()
    {
        return $this->hasMany(Timesheet::class);
    }
    public function projectMessage()
    {
        return $this->hasMany(ProjectMessage::class)->orderBy('created_at', 'desc');
    }
    public function module()
    {
        return $this->hasMany(Module::class)->orderBy('created_at', 'desc');
    }
}
