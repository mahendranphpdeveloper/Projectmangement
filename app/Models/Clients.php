<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    protected $table = 'clients';
    protected $fillable = [
        'segment',
        'url',
        'company_name',
        'contact_person',
        'email',
        'phone_number',
        'location',
        'zipcode',  
        'country',
    ];
}

