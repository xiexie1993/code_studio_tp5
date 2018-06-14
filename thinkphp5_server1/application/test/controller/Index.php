<?php
namespace app\test\controller;

use think\Request;

use app\test\controller\BaseAuth;


class Index extends BaseAuth
{
    
    
    /**
     * 基础-首页(需登录)
     * api GET http://域名或IP:端口/index.php/test/Index/index
     */
    public function index()
    {

        // return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="ad_bd568ce7058a1091"></think>';
    }

    /**
     * 查看php-jwt认证的用户信息（需登录）
     * api GET http://域名或IP:端口/index.php/test/Index/getUserInfo
     * @param   string  X-Auth-Token   放在请求头（header）X-Auth-Token的里的jwt加密字符串
     * @return  string  AuthMethod     标记身份认证方式为JWT
     * @return  string  AuthInfo       记录解密后的信息
     */
    public function getUserInfo()
    {
        
        $res['AuthMethod'] = $GLOBALS['AuthMethod']; // 标记身份认证方式为JWT
        $res['AuthInfo']   = $GLOBALS['AuthInfo'];   // 记录解密后的信息
        return json_encode($res); 
    }
}
