<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectControls extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'pro_name', 'pro_link', 'pro_image'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
