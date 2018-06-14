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
    // '/'=>['api/Index/index',['method'=>['get']]], 
    '/'=>['test/Login/index',['method'=>['get']]], 
    // '/'=>['api/Index/hello',['method'=>['get']]], 
    // // 定义资源路由
       //    '__rest__'=>[
       //        // 指向index模块的blog控制器
       //        'blog'=>'index/blog',
       //    ],
       //    // 定义普通路由
       //    'hello/:id'=>'index/hello',

    // Api模块
    //   登陆
        'api/Login/index'      => ['api/login/index'     ,['method'=>['get']  ]],
        'api/Login/login'      => ['api/Login/login'     ,['method'=>['post'] ]],
        'api/Login/getJWTInfo' => ['api/Login/getJWTInfo',['method'=>['get']  ]],

        'api/Index/index'      => ['api/Index/index',       ['method'=>['get']  ]],
        'api/Index/getUserInfo'=> ['api/Index/getUserInfo', ['method'=>['get']  ]],



    //   测试 demo
    //   登陆控制器
        // 'test/login/index'=>'test/login/index',
        // 'test/login/login'=>['test/login/login',['method'=>['post']]],
        // 'test/login/getjwtinfo'=>'test/login/JWTInfo',

        // 'test/index/index'=>'test/Index/index',
        // 'test/index/getjwtinfo'=>'test/Index/getJWTInfo',

        'test/Login/index'      => ['test/login/index'     ,['method'=>['get']  ]],
        'test/Login/login'      => ['test/Login/login'     ,['method'=>['post'] ]],
        'test/Login/getJWTInfo' => ['test/Login/getJWTInfo',['method'=>['get']  ]],

        'test/Index/index'      => ['test/Index/index',       ['method'=>['get']  ]],
        'test/Index/getUserInfo'=> ['test/Index/getUserInfo', ['method'=>['get']  ]],

        // 'test/login/verifident'=>['test/login/verifident',['method'=>['post']]],

    // apidoc
];