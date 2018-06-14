<?php
// +----------------------------------------------------------------------
// | Description: 基础类，身Api文档类
// +----------------------------------------------------------------------
// | Author: 
// +----------------------------------------------------------------------


require __DIR__ . '/../vendor/mumbaicat/makeapidoc/src/ApiDoc.php'; // 引入api文档生成类文件
use mumbaicat\makeapidoc\ApiDoc; // 声明类

$prj_name = 'ApiDoc_test';

$doc = new ApiDoc('../application/test'); //参数1是代码目录，参数2是保存路径，参数2默认是当前路径。
// dump($doc); exit();
$doc->setName($prj_name);           //设置项目名称，不写此行默认是api，生成 项目名称.html 的文件，注意保存路径下是否有同名的文件，会被覆盖。
$doc->make();                        //生成

echo "生成完毕！访问地址: <a href='http://".$_SERVER['HTTP_HOST'].'/'.$prj_name.'.html'."'>http://".$_SERVER['HTTP_HOST'].'/'.$prj_name.'.html</a>';

