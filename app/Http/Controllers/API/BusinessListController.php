<?php

namespace App\Http\Controllers\API;

use App\ApiModels\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusinessListController extends Controller
{
    //店铺
    public function index(){

        $shops = Shop::all();
        //dd($shops);
        $datas = [];
        foreach($shops as $shop){
            $data = [

                "id"=> "$shop->id",
                "shop_name"=> "$shop->shop_name",
                "shop_img"=> "$shop->shop_img",
                "shop_rating"=> $shop->shop_rating,/*评分*/
                "brand"=> $shop->brand,/*是否是品牌*/
                "on_time"=> $shop->on_time,/*是否准时送达*/
                "fengniao"=> $shop->fengniao,/*是否蜂鸟配送*/
                "bao"=>$shop->bao,/*是否保标记*/
                "piao"=> $shop->piao,/*是否票标记*/
                "zhun"=> $shop->zhun,//是否准标记
                "start_send"=>  $shop->start_send,//起送金额
                "send_cost"=> $shop->send_cost,//配送费
                "distance"=> 30,//距离
                "estimate_time"=> 2,//预计时间
                "notice"=> " $shop->notice",//店公告
                "discount"=> "$shop->discount"//优惠信息
            ];
            $datas[]=$data;
        }
         //dd($datas);
        return  $datas;
    }
}
