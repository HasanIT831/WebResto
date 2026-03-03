<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'admin';
    protected $primaryKey = 'ID_Admin'; // <-- TAMBAHKAN INI

    protected $fillable = [
        'Username',
        'Nama',
        'Email',
        'password',
        'Level'
    ];

    protected $hidden = [
        'password',
    ];
}