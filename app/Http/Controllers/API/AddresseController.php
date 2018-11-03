<?php

namespace App\Http\Controllers\API;

use App\ApiModels\Addresse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AddresseController extends Controller
{
    //
    /**
     * name: 收货人
     * tel: 联系方式
     * provence: 省
     * city: 市
     * area: 区
     * detail_address: 详细地址
     */
    //添加
    public function route(Request $request){
        Addresse::create(
            [
                'user_id'=> 1,
                'province'=> $request->provence,
                'city'=> $request->city,
                'county'=> $request->area,
                'address'=> $request->detail_address,
                'tel'=> $request->tel,
                'name'=> $request->name,
                'is_default'=> 1,
            ]
        );
        return $data =[
            "status"=> true,
            "message"=>"添加成功"
        ];
    }
    /**
     * id: 地址id,
     * name: 收货人
     * tel: 联系方式
     * provence: 省
     * city: 市
     * area: 区
     * detail_address: 详细地址
     */
    //修改
    public function edit(Request $request){
 /*       {
            "id": "2",
     "provence": "河北省",
     "city": "保定市",
     "area": "武侯区",
     "detail_address": "四川省成都市武侯区天府大道56号",
     "name": "张三",
     "tel": "18584675789"
    }*/
//dd($request->input());
        $id = $request->id;
       $res = Addresse::where('id',$id)->first();
    return $data =[
            'id'=> $res->id,
            'provence'=> $res->province,
            'city'=> $res->city,
            'area'=> $res-> county,
            'detail_address'=> $res->address,
            'tel'=> $res->tel,
            'name'=> $res->name,
        ];
    }
    public function update(Request $request){
        //dd($request->input());
        DB::table('addresses')->where('id',$request->id)->update(
            [
                'name'=>$request->name,
                'tel'=>$request->tel,
                'province'=>$request->provence,
                'city'=>$request->city,
                'county'=>$request->area,
                'address'=>$request->detail_address,
            ]
        );
        return $data =[
            "status"=> true,
            "message"=>"修改成功"
        ];
    }
/*[{
"id": "1",
"provence": "四川省",
"city": "成都市",
"area": "武侯区",
"detail_address": "四川省成都市武侯区天府大道56号",
"name": "张三",
"tel": "18584675789"
}, {
    "id": "2",
     "provence": "河北省",
     "city": "保定市",
     "area": "武侯区",
     "detail_address": "四川省成都市武侯区天府大道56号",
     "name": "张三",
     "tel": "18584675789"
    }]*/
    //列表
    public function index(){
        $addresses = Addresse::all();
        $datas='';
       foreach($addresses as $addresse){
              $data = [
               'id'=>$addresse->id,
               'provence'=>$addresse->province,
               'city'=>$addresse->city,
               'area'=>$addresse->county,
               'detail_address'=>$addresse->address,
               'name'=>$addresse->name,
               'tel'=>$addresse->tel,
               ];
           $datas[] = $data;
       }
        return $datas;
    }
}
