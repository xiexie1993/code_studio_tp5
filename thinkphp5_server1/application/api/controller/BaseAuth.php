<?php
// +----------------------------------------------------------------------
// | Description: Api基础类，身份认证验证权限
// +----------------------------------------------------------------------
// | Author: linchuangbin <linchuangbin@honraytech.com>
// +----------------------------------------------------------------------

namespace app\api\controller;

use think\Request;
use think\Db;

use Firebase\JWT\JWT; //声明php-jwt

class BaseAuth
{

    /**
     * 用户认证检查:(php-jwt)Token信息校验
     * api     隐藏路由
     * @param  string  X-Auth-Token  Header头部信息的php-jwt加密信息
     * @return string  error  错误信息
     * @return inetger code   102表示Token已过期,请重新登录
     * @return inetger code   103表示Token验证失败,请重新登录
     * @return 例1     json   
     */
    // public function _initialize()
    public function __construct()
    {
        // parent::_initialize();
        // exit(json_encode(['code'=>102,'error'=>'Token验证失败,请重新登录']));
        // 
        // 判断是哪种认证
        // 获取用户认证的几种数据来源
        // 
        
        //获取头部信息
        //$header = Request::instance()->header();
     
        //
        //用户认证窗口一：
        //  1、校验sessionid和authKey
        //  2、检查账号有效性
        //  3、更新缓存
        //
                // $authKey = $header['authkey'];
                // $sessionId = $header['sessionid'];
                // $cache = cache('Auth_'.$authKey);
                // // 校验sessionid和authKey
                // if (empty($sessionId)||empty($authKey)||empty($cache)) {
                //     header('Content-Type:application/json; charset=utf-8');
                //     exit(json_encode(['code'=>101, 'error'=>'登录已失效']));
                // }
                // // 检查账号有效性
                // $userInfo = $cache['userInfo'];
                // $map['id'] = $userInfo['id'];
                // $map['status'] = 1;
                // if (!Db::name('admin_user')->where($map)->value('id')) {
                //     header('Content-Type:application/json; charset=utf-8');
                //     exit(json_encode(['code'=>103, 'error'=>'账号已被删除或禁用']));   
                // }
                // // 更新缓存
                // cache('Auth_'.$authKey, $cache, config('LOGIN_SESSION_VALID'));
                // $authAdapter = new AuthAdapter($authKey);
                // $request = Request::instance();
                // $ruleName = $request->module().'-'.$request->controller() .'-'.$request->action(); 
                // if (!$authAdapter->checkLogin($ruleName, $cache['userInfo']['id'])) {
                //     header('Content-Type:application/json; charset=utf-8');
                //     exit(json_encode(['code'=>102,'error'=>'没有权限']));
                // }
                // $GLOBALS['userInfo'] = $userInfo;
          //
          //用户认证窗口二：php-jwt 的token存放在请求头中
          //
          //
          $request = Request::instance();
          // 获取头部信息
          // $jwt = Request::instance()->header('X-Auth-Token'); // 获取头部信息
          $jwt = $request->header('X-Auth-Token'); // 获取头部信息
          if (empty($jwt))
          {
              exit(json_encode(['code'=>102,'error'=>'你没有进入许可权（You do not have permission to access.）']));
          }
          try {
              JWT::$leeway = 60;
              $decoded = JWT::decode($jwt, config('jwt.KEY'), ['HS256']);
              $jwt_info = (array)$decoded;
              if ($jwt_info['exp'] < time())
              {
                  // $res['msg'] = '请重新登录';
                  exit(json_encode(['code'=>102,'error'=>'Token已过期,请重新登录']));
              }
              else
              {
                  // 验证签发者和来源
                  $c_ip = gethostbyname($_SERVER['SERVER_NAME']); // 服务端的域名(IP)变量
                  $s_ip = $request->ip(); // 客户端的域名(IP)变量
                  // $_SERVER['HTTP_X_FORWORD_FOR']; //jwt所面向的用户（即发起登陆的来源） 用户在哪个ip上使用的id，可能存在，也可能伪造
                  if($c_ip == $jwt_info['aud'] && $s_ip == $jwt_info['iss'])
                  {
                      // 验证通过
                      $GLOBALS['AuthMethod'] = 'JWT-Token'; // 标记身份认证方式为JWT
                      $GLOBALS['AuthInfo']   = $jwt_info;        // 记录解密后的身份标识
                  }
                  else
                  {
                      exit(json_encode(['code'=>104,'error'=>'Token验证成功,但签发或来源有问题','cip'=>$c_ip,'sip'=>$s_ip]));
                  }
              }
          }
          catch(Exception $e)
          {
              // $res['msg'] = 'Token验证失败,请重新登录';
              exit(json_encode(['code'=>103,'error'=>'Token验证失败,请重新登录']));
          }
        //
        //用户认证窗口三：
        //
        //
        
    }

}