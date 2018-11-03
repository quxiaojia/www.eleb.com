<?php

namespace App\ApiModels;

use Illuminate\Database\Eloquent\Model;

class Oreder extends Model
{
    //声明表
    protected $table='orders';
    //
    protected $fillable =['user_id','shop_id','sn','province','city','county','address','tel','name','total','status','out_trade_no'];
  /*  protected $timestamps =false;*/
    //关闭查询时间的自动维护
    public function asDateTime($value)
    {
        return $value;
    }

}
