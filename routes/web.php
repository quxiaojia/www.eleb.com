<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//接口
//商铺
Route::get('businessList','API\BusinessListController@index')->name('businessList');
//商铺详情
Route::get('business','API\BusinessController@index')->name('business');
//登录
Route::post('login','API\LoginController@login')->name('login');
//修改
Route::post('login.update_pwd','API\LoginController@update');
//重置密码
Route::post('login.reset','API\LoginController@reset');
//注册
Route::post('register','API\RegistController@route')->name('reg');
//短信
Route::get('sms','API\RegistController@sms');
//收货
Route::post('addressed.add','API\AddresseController@route')->name('addressed.add');
Route::get('addressed.index','API\AddresseController@index')->name('addressed.index');
Route::post('addressed.update','API\AddresseController@update')->name('addressed.update');
Route::get('addressed.edit','API\AddresseController@edit')->name('addressed.edit');
//购物车
Route::post('cart.add','API\CartController@route')->name('cart.add');
Route::get('cart.date','API\CartController@show')->name('cart.date');

//订单
Route::post('order.create','API\OrderController@create');
Route::get('order','API\OrderController@index');
Route::post('order.pay','API\OrderController@pay');
Route::get('order_list','API\OrderController@order_list');

