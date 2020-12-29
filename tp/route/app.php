<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

Route::get('think', function () {
    return 'hello,ThinkPHP6!';
});
Route::get('hello1/:name', 'index/hello');

//分页查询
Route::get('select', 'MessageBord/select')
    ->allowCrossDomain();

Route::get('qianduan', 'view/Tpmessage')
    ->allowCrossDomain();

//用户登录
Route::get('login', 'Login/login')
    ->allowCrossDomain();

//登录验证
Route::rule('checkUser', 'Login/checkUser')
    ->allowCrossDomain();

//用户注册
Route::get('register', 'Login/register')
    ->allowCrossDomain();

//新增留言
Route::get('insert', 'MessageBord/insert')
    ->allowCrossDomain();

//修改留言
Route::get('update', 'MessageBord/update')
    ->allowCrossDomain();


//软删除留言
Route::get('delete', 'MessageBord/delete')
    ->allowCrossDomain();


Route::get('captcha','Index/captcha');