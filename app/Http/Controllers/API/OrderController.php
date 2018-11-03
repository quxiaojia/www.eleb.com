<?php

namespace App\Http\Controllers\API;

use App\ApiModels\Addresse;
use App\ApiModels\Cart;
use App\ApiModels\Menu;
use App\ApiModels\OrderDetails;
use App\ApiModels\Oreder;
use App\ApiModels\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //添加
    public function create(Request $request){
        //return 1;
        //当前登录用户id
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
        //dd($datas);
        $goods_id = $goods_list['goods_id'];
        $menu = Menu::where('id',$goods_id)->first();
        $shop_id = $menu->shop_id;
        $sn =  time().rand();
        //地址id
        $address_id = $request->address_id;
        //$address_id = 3;
        $address = Addresse::where('id',$address_id)->first();
        $province = $address->province;
        $city = $address->city;
        $county = $address->county;
        $addre = $address->address;
        $tel = $address->tel;
        $name = $address->name;
        $out_trade_no =mt_rand();
        //dd($addre);
        DB::beginTransaction();
        try{
        $order = Oreder::create(
            ['user_id'=>$user_id,
               'shop_id'=>$shop_id,
                'sn' => $sn,
                'province'=>$province,
                'city'=>$city,
                'county'=>$county,
                'address'=>$addre,
                'tel'=>$tel,
                'name'=>$name,
                'total'=>$totalCost,
                'status' =>0,
                'out_trade_no'=>$out_trade_no
            ]
        );
        //获取订单id
        $order_id = $order->id;
        //获取商品种类数量
        $count = count($datas);
        for($i=0;$i<$count;$i++){
            OrderDetails::create(
                [
                    'order_id'=>$order_id,
                    'goods_id'=>$datas[$i]['goods_id'],
                    'amount'=>$datas[$i]['amount'],
                    'goods_name'=>$datas[$i]['goods_name'],
                    'goods_img'=>$datas[$i]['goods_img'],
                    'goods_price'=>$datas[$i]['goods_price']
                ]
            );
        }
        DB::table('carts')->where('user_id',$user_id)->delete();
        DB::commit();
            return $data = [
                "status"=>"true",
                "message"=> "添加成功",
                "order_id"=>$order_id
            ];
        }catch (\Exception $e){
            DB::rollBack();
            return $data = [
                "status"=>"false",
                "message"=> "添加失败",
            ];
        }
    }
    //指定订单
    public function index(Request $request){

        $order_id = $request->id;
        $user_id = auth()->user()->id;
        //$user_id =10;
        //$Carts = Cart::where('user_id',$user_id)->get();
        $orders = Oreder::where('user_id',$user_id)->where('id',$order_id)->get();
        //查询店铺名
        $shop = Oreder::where('user_id',$user_id)->where('status',0)->orderBy('id','desc')->first();
        //查询订单列表id
        //$order_id = $shop->id;
        $shop_id = $shop->shop_id;

        $shops= Shop::where('id',$shop_id)->first();
        //dd($shop_id);
        $shop_name = $shops->shop_name;
        $shop_img = $shops->shop_img;
       // dd($order_id);
        //goods_list
        $order_details = OrderDetails::where('order_id',$order_id)->get();
        //dd($order_details);
        $goods_list = [];
        foreach($order_details as $data){
            $goods_list[] = [
                'goods_id'=>$data->goods_id,
                'goods_name'=>$data->goods_name,
                'goods_img'=>$data->goods_img,
                'amount'=>$data->amount,
                'goods_price'=>$data->goods_price,
            ];
        }
        foreach($orders as $order){
            $order_address = $order->province.$order->city.$order->county.$order->address;
            $data =[
                'id'=>$order->id,
                'order_code'=>$order->sn,
                'order_birth_time'=>$order->created_at,
                'order_status'=>"代付款",
                'shop_id'=>$order->shop_id,
                'shop_name'=>$shop_name,
                'shop_img'=>$shop_img,
                'goods_list'=>$goods_list,
                'order_price'=>$order->total,
                'order_address'=>$order_address
            ];
        }
        return $data;
    }
    //支付
    public function pay(Request $request){
        //return 1;
        dd($request->input());
     /*   DB::table('orders')->where();*/

    }
    //订单列表
    public function order_list(){
        $user_id = auth()->user()->id;
        //dd($user_id);
        //$user_id =10;
        //$Carts = Cart::where('user_id',$user_id)->get();
        $orders = Oreder::where('user_id',$user_id)->get();
        //查询店铺名
        $shop = Oreder::where('user_id',$user_id)->where('status',0)->orderBy('id','desc')->first();
        //查询订单列表id
        $order_id = $shop->id;
        $shop_id = $shop->shop_id;
        $shops= Shop::where('id',$shop_id)->first();
        $shop_name = $shops->shop_name;
        $shop_img = $shops->shop_img;
        // dd($order_id);
        //goods_list
        $order_details = OrderDetails::where('order_id',$order_id)->get();
       // $order_details = OrderDetails::all();
        //dd($order_details);
        $goods_list = [];
        foreach($order_details as $data){
            $goods_list[] = [
                'goods_id'=>$data->goods_id,
                'goods_name'=>$data->goods_name,
                'goods_img'=>$data->goods_img,
                'amount'=>$data->amount,
                'goods_price'=>$data->goods_price,
            ];
        }
        //dd($goods_list);
        $datas =[];
        foreach($orders as $order){
            $order_address = $order->province.$order->city.$order->county.$order->address;
            $data =[
                'id'=>$order->id,
                'order_code'=>$order->sn,
                'order_birth_time'=>$order->created_at,
                'order_status'=>"代付款",
                'shop_id'=>$order->shop_id,
                'shop_name'=>$shop_name,
                'shop_img'=>$shop_img,
                'goods_list'=>$goods_list,
                'order_price'=>$order->total,
                'order_address'=>$order_address
            ];
            $datas[] =$data;
        }
        //dd($datas);
        return $datas;
    }
}
