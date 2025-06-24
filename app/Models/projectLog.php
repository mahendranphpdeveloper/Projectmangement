<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projectLog extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $except = [];
    protected $table = 'project_logs';
    
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function Module()
    {
        return $this->belongsTo(Module::class);
    }
}
