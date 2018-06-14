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


//use think\Route;
//Route::get('/',function(){
//    return 'Hello,world!';
//});

return [

    '/'=>['index/Index',['method'=>['get']]], 
	// 定义资源路由
    'hello'=>['index/hello',['method'=>['get']]], 
];
