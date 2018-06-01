<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $table = 'users';
    public $fillable = [
        'name',
        'email',
        'phone',
        'role',
        'password',
        'updated_at',
    ];
}
