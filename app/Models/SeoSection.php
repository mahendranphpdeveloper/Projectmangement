<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoSection extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $except = [];
    protected $table = 'seo_sections';
}
