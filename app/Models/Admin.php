<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'username',
        'password',
        'registered_at',
        'last_login_at',
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'registered_at' => 'datetime',
        'last_login_at' => 'datetime',
    ];
}
