<?php

/*$a = '{ "id": "s10001", "shop_name": "上沙麦当劳", "shop_img": "/images/shop-logo.png", "shop_rating": 4.5, "service_code": 4.6, "foods_code": 4.4, "high_or_low": true, "h_l_percent": 30, "brand": true, "on_time": true, "fengniao": true, "bao": true, "piao": true, "zhun": true, "start_send": 20, "send_cost": 5, "distance": 637, "estimate_time": 31, "notice": "新店开张，优惠大酬宾！", "discount": "新用户有巨额优惠！", "evaluate": [{ "user_id": 12344, "username": "w******k", "user_img": "/images/slider-pic4.jpeg", "time": "2017-2-22", "evaluate_code": 1, "send_time": 30, "evaluate_details": "不怎么好吃" }, { "user_id": 12344, "username": "w******k", "user_img": "/images/slider-pic4.jpeg", "time": "2017-2-22", "evaluate_code": 4.5, "send_time": 30, "evaluate_details": "很好吃" }, { "user_id": 12344, "username": "w******k", "user_img": "/images/slider-pic4.jpeg", "time": "2017-2-22", "evaluate_code": 5, "send_time": 30, "evaluate_details": "很好吃" }, { "user_id": 12344, "username": "w******k", "user_img": "/images/slider-pic4.jpeg", "time": "2017-2-22", "evaluate_code": 4.7, "send_time": 30, "evaluate_details": "很好吃" }, { "user_id": 12344, "username": "w******k", "user_img": "/images/slider-pic4.jpeg", "time": "2017-2-22", "evaluate_code": 5, "send_time": 30, "evaluate_details": "很好吃" } ], "commodity": [{ "description": "大家喜欢吃，才叫真好吃。", "is_selected": true, "name": "热销榜", "type_accumulation": "c1", "goods_list": [{ "goods_id": 100001, "goods_name": "吮指原味鸡", "rating": 4.67, "goods_price": 11, "description": "", "month_sales": 590, "rating_count": 91, "tips": "具有神秘配方浓郁的香料所散发的绝佳风味，鲜嫩多汁。", "satisfy_count": 8, "satisfy_rate": 95, "goods_img": "/images/slider-pic4.jpeg" }, { "goods_id": 100002, "goods_name": "香辣鸡腿堡", "rating": 5, "goods_price": 17, "description": "", "month_sales": 723, "rating_count": 65, "tips": "整块无骨鸡腿肉, 浓郁汉堡酱，香脆鲜辣多汁。", "satisfy_count": 6, "satisfy_rate": 100, "goods_img": "/images/slider-pic4.jpeg" }, { "goods_id": 100003, "goods_name": "蟹黄堡", "rating": 5, "goods_price": 17, "description": "", "month_sales": 723, "rating_count": 65, "tips": "浓郁汉堡酱，香脆鲜辣多汁。", "satisfy_count": 6, "satisfy_rate": 100, "goods_img": "/images/slider-pic4.jpeg" } ] }, { "description": "", "is_selected": false, "name": "美味汉堡", "type_accumulation": "c2", "goods_list": [{ "goods_id": 100004, "goods_name": "麦香鸡腿堡", "rating": 5, "goods_price": 18, "description": "", "month_sales": 723, "rating_count": 65, "tips": "整块无骨鸡腿肉, 浓郁汉堡酱，香脆鲜辣多汁。", "satisfy_count": 6, "satisfy_rate": 100, "goods_img": "/images/slider-pic4.jpeg" }, { "goods_id": 100005, "goods_name": "腿堡", "rating": 5, "goods_price": 18, "description": "", "month_sales": 723, "rating_count": 65, "tips": "整块无骨鸡腿肉, 浓郁汉堡酱，香脆鲜辣多汁。", "satisfy_count": 6, "satisfy_rate": 100, "goods_img": "/images/slider-pic4.jpeg" } ] }, { "description": "", "is_selected": false, "name": "派", "type_accumulation": "c3", "goods_list": [{ "goods_id": 100006, "goods_name": "红豆派", "rating": 5, "goods_price": 11, "description": "", "month_sales": 723, "rating_count": 65, "tips": "整块无骨鸡腿肉, 浓郁汉堡酱，香脆鲜辣多汁。", "satisfy_count": 6, "satisfy_rate": 100, "goods_img": "/images/slider-pic4.jpeg" }, { "goods_id": 100007, "goods_name": "香芋派", "rating": 5, "goods_price": 11, "description": "", "month_sales": 723, "rating_count": 65, "tips": "整块无骨鸡腿肉, 浓郁汉堡酱，香脆鲜辣多汁。", "satisfy_count": 6, "satisfy_rate": 100, "goods_img": "/images/slider-pic4.jpeg" } ] }, { "description": "", "is_selected": false, "name": "饮料", "type_accumulation": "c4", "goods_list": [{ "goods_id": 100008, "goods_name": "可乐", "rating": 5, "goods_price": 8, "description": "", "month_sales": 723, "rating_count": 65, "tips": "小杯可乐", "satisfy_count": 6, "satisfy_rate": 100, "goods_img": "/images/slider-pic4.jpeg" }] } ] }';*/

/*echo"<pre>";*/
/*var_dump(json_decode($a, true));echo"</pre>";die;

echo <<<JSON
    {
        "id": "s10001",
        "shop_name": "上沙麦当劳",
        "shop_img": "/images/shop-logo.png",
        "shop_rating": 4.5,
        "service_code": 4.6,
        "foods_code": 4.4,
        "high_or_low": true,
        "h_l_percent": 30,
        "brand": true,
        "on_time": true,
        "fengniao": true,
        "bao": true,
        "piao": true,
        "zhun": true,
        "start_send": 20,
        "send_cost": 5,
        "distance": 637,
        "estimate_time": 31,
        "notice": "新店开张，优惠大酬宾！",
        "discount": "新用户有巨额优惠！",
        "evaluate": [{
                "user_id": 12344,
                "username": "w******k",
                "user_img": "/images/slider-pic4.jpeg",
                "time": "2017-2-22",
                "evaluate_code": 1,
                "send_time": 30,
                "evaluate_details": "不怎么好吃"
            },
            {
                "user_id": 12344,
                "username": "w******k",
                "user_img": "/images/slider-pic4.jpeg",
                "time": "2017-2-22",
                "evaluate_code": 4.5,
                "send_time": 30,
                "evaluate_details": "很好吃"
            },
            {
                "user_id": 12344,
                "username": "w******k",
                "user_img": "/images/slider-pic4.jpeg",
                "time": "2017-2-22",
                "evaluate_code": 5,
                "send_time": 30,
                "evaluate_details": "很好吃"
            },
            {
                "user_id": 12344,
                "username": "w******k",
                "user_img": "/images/slider-pic4.jpeg",
                "time": "2017-2-22",
                "evaluate_code": 4.7,
                "send_time": 30,
                "evaluate_details": "很好吃"
            },
            {
                "user_id": 12344,
                "username": "w******k",
                "user_img": "/images/slider-pic4.jpeg",
                "time": "2017-2-22",
                "evaluate_code": 5,
                "send_time": 30,
                "evaluate_details": "很好吃"
            }
        ],
        "commodity": [{
                "description": "大家喜欢吃，才叫真好吃。",
                "is_selected": true,
                "name": "热销榜",
                "type_accumulation": "c1",
                "goods_list": [{
                        "goods_id": 100001,
                        "goods_name": "吮指原味鸡",
                        "rating": 4.67,
                        "goods_price": 11,
                        "description": "",
                        "month_sales": 590,
                        "rating_count": 91,
                        "tips": "具有神秘配方浓郁的香料所散发的绝佳风味，鲜嫩多汁。",
                        "satisfy_count": 8,
                        "satisfy_rate": 95,
                        "goods_img": "/images/slider-pic4.jpeg"
                    },
                    {
                        "goods_id": 100002,
                        "goods_name": "香辣鸡腿堡",
                        "rating": 5,
                        "goods_price": 17,
                        "description": "",
                        "month_sales": 723,
                        "rating_count": 65,
                        "tips": "整块无骨鸡腿肉, 浓郁汉堡酱，香脆鲜辣多汁。",
                        "satisfy_count": 6,
                        "satisfy_rate": 100,
                        "goods_img": "/images/slider-pic4.jpeg"
                    },
                    {
                        "goods_id": 100003,
                        "goods_name": "蟹黄堡",
                        "rating": 5,
                        "goods_price": 17,
                        "description": "",
                        "month_sales": 723,
                        "rating_count": 65,
                        "tips": "浓郁汉堡酱，香脆鲜辣多汁。",
                        "satisfy_count": 6,
                        "satisfy_rate": 100,
                        "goods_img": "/images/slider-pic4.jpeg"
                    }
                ]
            },
            {
                "description": "",
                "is_selected": false,
                "name": "美味汉堡",
                "type_accumulation": "c2",
                "goods_list": [{
                        "goods_id": 100004,
                        "goods_name": "麦香鸡腿堡",
                        "rating": 5,
                        "goods_price": 18,
                        "description": "",
                        "month_sales": 723,
                        "rating_count": 65,
                        "tips": "整块无骨鸡腿肉, 浓郁汉堡酱，香脆鲜辣多汁。",
                        "satisfy_count": 6,
                        "satisfy_rate": 100,
                        "goods_img": "/images/slider-pic4.jpeg"
                    },
                    {
                        "goods_id": 100005,
                        "goods_name": "腿堡",
                        "rating": 5,
                        "goods_price": 18,
                        "description": "",
                        "month_sales": 723,
                        "rating_count": 65,
                        "tips": "整块无骨鸡腿肉, 浓郁汉堡酱，香脆鲜辣多汁。",
                        "satisfy_count": 6,
                        "satisfy_rate": 100,
                        "goods_img": "/images/slider-pic4.jpeg"
                    }
                ]
            },
            {
                "description": "",
                "is_selected": false,
                "name": "派",
                "type_accumulation": "c3",
                "goods_list": [{
                        "goods_id": 100006,
                        "goods_name": "红豆派",
                        "rating": 5,
                        "goods_price": 11,
                        "description": "",
                        "month_sales": 723,
                        "rating_count": 65,
                        "tips": "整块无骨鸡腿肉, 浓郁汉堡酱，香脆鲜辣多汁。",
                        "satisfy_count": 6,
                        "satisfy_rate": 100,
                        "goods_img": "/images/slider-pic4.jpeg"
                    },
                    {
                        "goods_id": 100007,
                        "goods_name": "香芋派",
                        "rating": 5,
                        "goods_price": 11,
                        "description": "",
                        "month_sales": 723,
                        "rating_count": 65,
                        "tips": "整块无骨鸡腿肉, 浓郁汉堡酱，香脆鲜辣多汁。",
                        "satisfy_count": 6,
                        "satisfy_rate": 100,
                        "goods_img": "/images/slider-pic4.jpeg"
                    }
                ]
            },
            {
                "description": "",
                "is_selected": false,
                "name": "饮料",
                "type_accumulation": "c4",
                "goods_list": [{
                    "goods_id": 100008,
                    "goods_name": "可乐",
                    "rating": 5,
                    "goods_price": 8,
                    "description": "",
                    "month_sales": 723,
                    "rating_count": 65,
                    "tips": "小杯可乐",
                    "satisfy_count": 6,
                    "satisfy_rate": 100,
                    "goods_img": "/images/slider-pic4.jpeg"
                }]
            }
        ]
    }
JSON;

die;*/


/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
