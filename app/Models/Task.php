<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_module_id', 'task_name', 'task_description', 
        'task_status', 'start_date', 'due_date'
    ];

  public function module()
{
    return $this->belongsTo(Module::class);
}
public function taskLogs(): HasMany
    {
        return $this->hasMany(TaskLog::class);
    }
    /**
 * Get the total duration of all task logs in seconds.
 */
public function getTotalDurationAttribute(): int
{
    return $this->taskLogs()->sum('duration');
}

}