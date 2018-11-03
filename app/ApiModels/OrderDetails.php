<?php

namespace App\ApiModels;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    //
    protected $table = 'order_details';
    protected $fillable = ['order_id','goods_id','amount','goods_name','goods_img','goods_price'];
}
