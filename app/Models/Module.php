<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'name', 'description'];
    
 
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function ProjectLog()
    {
        return $this->hasMany(projectLog::class)->orderBy('created_at', 'desc');
    }
  public function tasks()
{
    return $this->hasMany(Task::class, 'project_module_id'); // Adjust if your foreign key name is different
}

public function project()
{
    return $this->belongsTo(Project::class, 'project_id');
}




}

