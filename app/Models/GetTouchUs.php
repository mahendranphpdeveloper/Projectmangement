<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetTouchUs extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_id',
        'title1',
        'title2',
        'title3',
        'years',
        'clients',
        'projects',
        'reviews',
    ];
}
