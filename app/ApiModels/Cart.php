<?php

namespace App\ApiModels;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $fillable =['goods_id','amount','user_id'];

    //模型关联
    public function menu(){
        return $this->belongsTo(Menu::class,'goods_id');
    }
}
