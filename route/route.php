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

//首页路由规划
Route::rule('login','admin/login/loginsystemshow');
Route::rule('index','index/index/index');
Route::rule('product','index/product/index');
Route::rule('news','index/news/index');
Route::rule('cases','index/cases/index');
Route::rule('contact','index/contact/index');
Route::rule('about','index/about/index');
Route::rule('message','index/message/index');
Route::rule('map?query=','https://www.amap.com/search');

//产品分类路由
Route::rule('productClass','index/product/productclassifyshow','get');
Route::rule('newsClass','index/news/newsclassifyshow','get');
Route::rule('casesClass','index/cases/caseclassifyshow','get');

//详情进入路由
Route::rule('newsInfo','index/news/newsinfo','get');
Route::rule('productInfo','index/product/productinfo','get');
Route::rule('casesInfo','index/cases/casesinfo','get');
Route::rule('upMes','index/Message/addMessage','get');

