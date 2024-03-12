<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authentication;
use Laravel\Sanctum\HasApiTokens;

class User extends Authentication
{
    use HasApiTokens;
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'username', 'email', 'password', 'avatar'
    ];
}
