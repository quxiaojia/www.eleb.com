<?php

namespace App\ApiModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Member extends User
{
    //
    protected $fillable =['tel','username','password',''];
}
