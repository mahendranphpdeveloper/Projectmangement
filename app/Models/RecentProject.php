<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecentProject extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $except = [];
    protected $table = 'recent_projects';
}
