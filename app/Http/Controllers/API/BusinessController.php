<?php

namespace App\Http\Controllers\API;

use App\ApiModels\Menu;
use App\ApiModels\MenuCategory;
use App\ApiModels\Shop;
use App\ApiModels\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusinessController extends Controller
{
    //指定商铺详情
    public function index(Request $request){
        //dd($request->input());
        $users = User:: all();
        $shops = Shop::all();
        //$shop_id = Shop::where('id',$request->id)->first();
        $menu_categorys = MenuCategory::where('shop_id',$request->id)->get();
        //dd($menu_categorys);
        $menus = Menu::all();
      /*  $menu_categorys_id  = MenuCategory::where('shop_id',$request->id)->first();
        $menu_categorys_id = $menu_categorys_id->id;
        //dd($menu_categorys_id);
        $menus = Menu::where('category',$menu_categorys_id)->get();
        dd($menus);*/
        //评价
        $evaluates =[];
         foreach($users as $user){
            $evaluate = [
                //
                "user_id"=>   $user->id,
                "username"=>    $user->name,
                "user_img"=>   "/images/slider-pic4.jpeg",
                "time"=>   "2017-2-22",
                "evaluate_code"=>   1,
                "send_time"=>   30,
                "evaluate_details"=>   "不怎么好吃"

            ];
             $evaluates[] =$evaluate;
        }
        //菜品
        $goods_lists =[];
        foreach($menus as $menu){
            $goods_list = [//类型下的商品
                    "goods_id"=> $menu->id,
                    "goods_name"=> $menu-> goods_name,
                    "rating"=> $menu->rating ,//评分
                    "goods_price"=>$menu->goods_price ,
                    "description"=>$menu->description,
                    "month_sales"=>$menu-> month_sales,//月销售
                    "rating_count"=>$menu->rating_count,//评分比率
                    "tips"=> $menu->tips,//描述
                    "satisfy_count"=>$menu->satisfy_count,//好评数
                    "satisfy_rate"=>$menu->satisfy_rate,//好评率
                    "goods_img"=>   $menu->goods_img];
            $goods_lists[]=$goods_list;
        }
        //菜品分类
        $commoditys =[];
        foreach($menu_categorys as $menu_category){
            $commodity =   [//店铺商品
                "description"=> $menu_category->description ,//分类描述
                "is_selected"=>$menu_category->is_selected   ,//是否选中
                "name"=>  $menu_category->name,//分类名称
                "type_accumulation"=> $menu_category->type_accumulation,
                "goods_list"=>$goods_lists,

            ];
            $commoditys[] =$commodity;
        }
        //dd($evaluates);
        foreach($shops as $shop){
            $data = [
              
                    "id"=>   $shop->id,
                    "shop_name"=>   $shop->shop_name,
                    "shop_img"=>   $shop->shop_img,
                    "shop_rating"=>  $shop->shop_rating,
                    "service_code"=>   4.6,// 服务总评分
                    "foods_code"=>   4.4,// 食物总评分
                    "high_or_low"=>   true,// 低于还是高于周边商家
                    "h_l_percent"=>   30,// 低于还是高于周边商家的百分比
                    "brand"=>  $shop->brand,
                    "on_time"=> $shop->on_time,
                    "fengniao"=>  $shop->fengniao,
                    "bao"=>  $shop->bao,
                    "piao"=>   $shop->piao,
                    "zhun"=>   $shop->zhun,
                    "start_send"=>   $shop->start_send,
                    "send_cost"=> $shop->send_cost,
                    "distance"=>   637,
                    "estimate_time"=>   31,
                    "notice"=>   $shop->notice,
                    "discount"=>   $shop->discount,
                    "evaluate"=>   $evaluates,
                    "commodity"=>  $commoditys,
            ];


        }
        return  $data;
    }

}
