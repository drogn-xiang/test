<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
define('ROOT_BASE','hotel_test/public');

//登陆接口
$app->get(ROOT_BASE.'/login',function(){
    return view('login');
});
//管理界面接口
//$app->get(ROOT_BASE.'/admin',['middleware'=>'old',function(){
//    return view('admin');
//}]);
$app->get(ROOT_BASE.'/admin',function(){
    return view('admin');
});


//客房页面
$app->get(ROOT_BASE.'/room/{type}','ExampleController@room');
//客房操作
$app->get(ROOT_BASE.'/roominfo/{info}','ExampleController@roominfo');
//登录操作
$app->post(ROOT_BASE.'/checkin','ExampleController@test');
//用户页面
$app->get(ROOT_BASE.'/user/{type}','ExampleController@user');
//用户操作
$app->post(ROOT_BASE.'/userinfo/{info}','ExampleController@userinfo');
//订单的路由
$app->get(ROOT_BASE.'/order/{type}','ExampleController@order');
//订单请求操作
$app->post(ROOT_BASE.'/orderinfo/{info}','ExampleController@orderinfo');




