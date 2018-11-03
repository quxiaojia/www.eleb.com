<?php

namespace App\Http\Controllers\API;

use App\ApiModels\Member;
use App\ApiModels\SignatureHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class RegistController extends Controller
{
    //
    public function route(Request $request){
       //dd($request->input());
        //redis下的验证码
        $sms = Redis::get('code');

        //注册的手机号跟验证码
        $new_sms = $request->tel.$request->sms;
        //dd($sms);

        //验证码判断
        if($new_sms != $sms){
            return $data =[
                "status"=> false,
                "message"=> "验证码不正确"
            ];
        }
        $password = bcrypt($request->password);
       // dd($password);
        Member::create(
            [
                'username'=>$request->username,
                'tel'=>$request->tel,
                'password'=>$password,
            ]
        );
        return $data =[
            "status"=> "true",
            "message"=> "注册成功"
        ];
    }

    //发送短信验证
    public function sms(Request $request)
    {

        $tel = $request->tel;
         //dd($tel);
        $vcode = mt_rand(100000, 999999);
        //dd($vcode);
        //发送短信
       // $this->tel($tel,$vcode);
        $code = $tel.$vcode;
        //dd($code);
        Redis::setex('code',300,$code);
        return [
            'status' => true,
            'message' => '验证码已发送'
        ];
    }
    public function tel($tel,$vcode){
        //dd($tel);
        $params = array();

        // *** 需用户填写部分 ***
        // fixme 必填：是否启用https
        $security = false;

        // fixme 必填: 请参阅 https://ak-console.aliyun.com/ 取得您的AK信息
        $accessKeyId = "LTAIuXdGDdcRFpYi";
        $accessKeySecret = "9TfiGDH555K3SJOSXPXH9usLVOJluK";

        // fixme 必填: 短信接收号码
        $params["PhoneNumbers"] = $tel;

        // fixme 必填: 短信签名，应严格按"签名名称"填写，请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/sign
        $params["SignName"] = "学习使用";

        // fixme 必填: 短信模板Code，应严格按"模板CODE"填写, 请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/template
        $params["TemplateCode"] = "SMS_149390793";

        // fixme 可选: 设置模板参数, 假如模板中存在变量需要替换则为必填项
        $params['TemplateParam'] = Array(
            "code" => $vcode,
            //"product" => "阿里通信"
        );

        // fixme 可选: 设置发送短信流水号
        //$params['OutId'] = "12345";

        // fixme 可选: 上行短信扩展码, 扩展码字段控制在7位或以下，无特殊需求用户请忽略此字段
        //$params['SmsUpExtendCode'];


        // *** 需用户填写部分结束, 以下代码若无必要无需更改 ***
        if (!empty($params["TemplateParam"]) && is_array($params["TemplateParam"])) {
            $params["TemplateParam"] = json_encode($params["TemplateParam"], JSON_UNESCAPED_UNICODE);
        }

        // 初始化SignatureHelper实例用于设置参数，签名以及发送请求
        $helper = new SignatureHelper();

        // 此处可能会抛出异常，注意catch
        $content = $helper->request(
            $accessKeyId,
            $accessKeySecret,
            "dysmsapi.aliyuncs.com",
            array_merge($params, array(
                "RegionId" => "cn-hangzhou",
                "Action" => "SendSms",
                "Version" => "2017-05-25",
            )),
            $security
        );
    }
}
