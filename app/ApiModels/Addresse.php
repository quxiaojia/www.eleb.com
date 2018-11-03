<?php

namespace App\ApiModels;

use Illuminate\Database\Eloquent\Model;

class Addresse extends Model
{
    //
    protected $fillable =['user_id','province','city','county','address','tel','name','is_default'];
}
