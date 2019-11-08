<?php

namespace App\Http\Controllers;

use App\ModelUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class User extends Controller
{
    protected $fillable = [
        'name', 'username', 'email', 'password'
    ];
}
