<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMessage extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'message_type', 'message', 'document'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
