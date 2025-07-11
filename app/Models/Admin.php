<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admins'; 

    protected $fillable = [
        'username', 'password', 'admin_role',
    ];

    protected $hidden = [
        'password',
    ];
}
