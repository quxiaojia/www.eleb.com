<?php

namespace App\ApiModels;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    public function shop(){
        return $this->belongsTo(Shop::class);
    }
}
