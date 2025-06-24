<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'pro_name', 'pro_type', 'pro_budget', 'start_date', 'end_date', 
        'client_name', 'client_email', 'client_phone', 'client_address', 
        'review_date', 'status', 'pro_status', 'proof'
    ];

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_project');
    }
    public function projectMessage()
    {
        return $this->hasMany(ProjectMessage::class)->orderBy('created_at', 'desc');
    }
// In Project.php model
    public function module()
    {
        return $this->hasMany(Module::class)->orderBy('created_at', 'desc');
    }
    public function ProjectControls()
    {
        return $this->hasOne(ProjectControls::class)->orderBy('created_at', 'desc');
    }
    public function ProjectLog()
    {
        return $this->hasMany(projectLog::class)->orderBy('created_at', 'desc');
    }
    
}
