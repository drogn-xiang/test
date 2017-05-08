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

//��½�ӿ�
$app->get(ROOT_BASE.'/login',function(){
    return view('login');
});
//�������ӿ�
//$app->get(ROOT_BASE.'/admin',['middleware'=>'old',function(){
//    return view('admin');
//}]);
$app->get(ROOT_BASE.'/admin',function(){
    return view('admin');
});


//�ͷ�ҳ��
$app->get(ROOT_BASE.'/room/{type}','ExampleController@room');
//�ͷ�����
$app->get(ROOT_BASE.'/roominfo/{info}','ExampleController@roominfo');
//��¼����
$app->post(ROOT_BASE.'/checkin','ExampleController@test');
//�û�ҳ��
$app->get(ROOT_BASE.'/user/{type}','ExampleController@user');
//�û�����
$app->post(ROOT_BASE.'/userinfo/{info}','ExampleController@userinfo');
//������·��
$app->get(ROOT_BASE.'/order/{type}','ExampleController@order');
//�����������
$app->post(ROOT_BASE.'/orderinfo/{info}','ExampleController@orderinfo');




