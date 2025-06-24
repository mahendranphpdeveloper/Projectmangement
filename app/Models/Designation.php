<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'designations';

    // Inverse relationship to get employees
    public function employees()
    {
        return $this->hasMany(Employee::class, 'designation_id'); // Ensure this points to the correct foreign key
    }
}
