<?php

namespace App\Http\Controllers\API;

use App\ApiModels\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    //购物车
    public function route(Request $request){
      //dd($request->input());
        $good_lists = $request->goodsList;
        $good_count= $request->goodsCount;

        //dd($good_lists);

        $user_id = auth()->user()->id;
       // dd($user_id);
        //获取商品种类数量
        $count = count($good_lists);
        for($i=0;$i<$count;$i++){
            $amount = $good_count[$i];
            $good_id  = $good_lists[$i];
            Cart::create(
                [
                    'user_id'=>$user_id,
                    'goods_id'=>$good_id,
                    'amount'=>$amount,
                ]
            );
        }

        return $data = [
            "status"=> "true",
            "message"=> "添加成功",
           /* 'goods_list'=>$request->goodsList,
            'goods_count'=>$request->goodsCount*/
        ];
    }
/*{
"goods_list": [{
"goods_id": "1",
"goods_name": "汉堡",
"goods_img": "http://www.homework.com/images/slider-pic2.jpeg",
"amount": 6,
"goods_price": 10
},{
    "goods_id": "1",
        "goods_name": "汉堡",
        "goods_img": "http://www.homework.com/images/slider-pic2.jpeg",
        "amount": 6,
        "goods_price": 10
      }],
"totalCost": 120
    }*/
    //获取购物车数据
    public function show(){
        $user_id = auth()->user()->id;
        //$user_id = 10;
        $Carts = Cart::where('user_id',$user_id)->get();
        $totalCost ='';
        foreach($Carts as $Cart){
            $goods_list = [
                'goods_id'=>$Cart->goods_id,
                'goods_name'=>$Cart->menu->goods_name,
                'goods_img'=>$Cart->menu->goods_img,
                'amount'=>$Cart->amount,
               'goods_price'=>$Cart->menu->goods_price,
            ];
            $totalCost += $Cart->amount*$Cart->menu->goods_price;
            $datas []=$goods_list;
        }

        return $data = [
            'goods_list'=>$datas,
            'totalCost'=>$totalCost
        ];
    }
}
