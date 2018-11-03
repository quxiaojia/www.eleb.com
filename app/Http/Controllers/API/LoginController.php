<?php

namespace App\Http\Controllers\API;

use App\ApiModels\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\ApiModels\SignatureHelper;
use Illuminate\Support\Facades\Redis;

class LoginController extends Controller
{
    //
/*    /**
     * name:用户名
     * password:密码
     */
/*echo <<<JSON
    {
        "status":"true",
        "message":"登录成功",
        "user_id":"1",
        "username":"张三"
    }*/

    public function login(Request $request){
        //dd($request->input());
        if(Auth::attempt(['username'=>$request->name,'password'=>$request->password])){
            return $data =[
                'status' =>"true",
                'message' => "登录成功",
                'user_id' =>auth()->user()->id,
                'username'=>auth()->user()->username,
            ];
        }else{

            return $data =[
                'status' =>false,
                'message' => "登录失败，用户名或密码错误",
            ];
        }
    }

    //修改密码
    public function update(Request $request){
        //dd($request->input());
        $password = auth()->user()->password;
        if(Hash::check("$request->oldPassword",$password)){

            $password = Bcrypt($request->newPassword);
            auth()->user()->update(
                [
                    'password'=>$password,
                ]
            );
         return $data =[
             "status"=> "true",
            "message"=> "修改成功"
         ];
        }
        return $data =[
            "status"=> "false",
            "message"=> "旧密码填写不正确"
        ];
    }
    //重置密码
    public function reset(Request $request){
        //dd($request->input());
        $new_sms = $request->tel.$request->sms;
        $sms = Redis::get('code');
        //dd($sms);
        if($new_sms != $sms){
            return $data =[
                "status"=> false,
                "message"=> "验证码不正确"
            ];
        }
        $password = bcrypt($request->password);
        $user = Member::where('tel',$request->tel)->first();
        if(!$user){
            return $data=[
                "status"=> "false",
                 "message"=>"重置密码失败,未查询到此用户"
            ];
        }
        DB::table('members')->where('tel',$request->tel)->update(['password'=>$password]);
        return $data=[
            "status"=> "true",
            "message"=>"重置密码成功"
        ];

    }





}
