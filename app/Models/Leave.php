<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    // Define any fillable properties, relationships, etc.
    protected $fillable = ['employee_id', 'leave_date', 'reason']; // Adjust according to your fields

    public function employee()
    {
        return $this->belongsTo(Employee::class); // Adjust if necessary
    }
}
