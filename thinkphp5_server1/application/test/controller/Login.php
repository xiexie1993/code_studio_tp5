<?php
namespace app\test\controller;

use Firebase\JWT\JWT;
use think\Request;

class Login
{

    // config('jwt.KEY') //php-jwt的加密秘钥，（在配置文件中）


    public function index()
    {
        echo '测试模块 application\api\controller\Login.php ';
    }

    /**
     * 用户认证:登陆(php-jwt)
     * api POST http://域名或IP:端口/index.php/test/Login/login
     * @param  string   username  用户名
     * @param  string   passwd    用户密码
     * @return inetger  code      状态码,101
     * @return string   msg       错误信息或提示信息
     */
    
    public function login()
    {
        $res['result'] = 'failed';
        // $username = 'admin';
        // $password = 'admin';
        // $username = input('?post.username');//Request::instance()->param('username'); // 获取当前请求的 passwd 变量
        // $password = input('?post.passwd');//Request::instance()->param('passwd'); // 获取当前请求的 passwd 变量
        $request = Request::instance();
        // $username = Request::instance()->param('username'); // 获取当前请求的 username 变量
        // $password = Request::instance()->param('passwd');   // 获取当前请求的 passwd 变量
        $username = $request->param('username'); // 获取当前请求的 username 变量
        $password = $request->param('passwd');   // 获取当前请求的 passwd 变量

        // return json($username);
        if ($username == 'admin' && $password == 'admin') //用户名和密码正确，则签发tokon
        {
            // $nowtime = time();
            // $token = [
            //     // 'iss' => 'http://datasynlocal.xzb.com', //签发者
            //     // 'aud' => 'http://datasynlocal.xzb.com', //jwt所面向的用户
                
            //     'iss' => gethostbyname($_SERVER['SERVER_NAME']), //签发者 服务端的域名变量
            //     'aud' => getenv($_SERVER['HTTP_X_FORWORD_FOR']), //jwt所面向的用户（即发起登陆的来源） 用户在哪个ip上使用的id，可能存在，也可能伪造
            //     'iat' => $nowtime, //签发时间
            //     'nbf' => $nowtime + 10, //在什么时间之后该jwt才可用
            //     'exp' => $nowtime + 600, //过期时间-10min
            //     'data' => [
            //         'userid' => 1,
            //         'username' => $username
            //     ]
            // ];
            // $jwt = JWT::encode($token, config('jwt.KEY'));
            // $res['result'] = 'success';
            // $res['jwt'] = $jwt;
            // 
            $issuer     = gethostbyname($_SERVER['SERVER_NAME']);//签发者 服务端的域名变量
            $face_users = $request->ip();
            // $_SERVER['HTTP_X_FORWORD_FOR']; //jwt所面向的用户（即发起登陆的来源） 用户在哪个ip上使用的id，可能存在，也可能伪造
            $userid     = 1;
            // $username   = $username;
            $other_data  = array('msg' => '测试模块，测试jwt' ); // 不要存放重要信息
            $expiry_time = 600; // 过期时间 （单位：秒）
            $jwt = $this->issueJWTToken($issuer,$face_users,$userid,$username,$other_data,$expiry_time);
            $res['result'] = 'success';
            $res['jwt'] = $jwt;
        } 
        else 
        {
            $res['msg'] = '用户名或密码错误!';
        }
        // return json_encode($res);
        return json($res);
    }



      // 签发JWT加密的Token令牌
      // param   $KEY         [ 加密密钥 ]
      // param   $issuer      [ 签发者 ]
      // param   $face_users  [ jwt所面向的用户 ]
      // param   $expiry_time [ jwt Token 过期时间(单位：秒) ] 
      // param   $userid      [ 用户ID ]
      // param   $username    [ 用户名 ]
      // param   $other_data  [ 其他数据数组 ]
      // return json [ 签发的JWT格式的Token ] 例： {"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9kYXRhc3lubG9jYWwueHpiLmNvbSIsImF1ZCI6Imh0dHA6XC9cL2RhdGFzeW5sb2NhbC54emIuY29tIiwiaWF0IjoxNTI3NTgxNTI0LCJuYmYiOjE1Mjc1ODE1MzQsImV4cCI6MTUyNzU4MjEyNCwiZGF0YSI6eyJ1c2VyaWQiOjEsInVzZXJuYW1lIjoiYWRtaW4ifX0.TcYspD1vhj-NgkzHzi5aR70cBlLUhJwdBT1cqrCM58w"}
     
     
    public function issueJWTToken($issuer,$face_users,$userid,$username,$other_data,$expiry_time)
    {
            $nowtime = time();
            // $token = [
            //     'iss' => 'http://datasynlocal.xzb.com', //签发者
            //     'aud' => 'http://datasynlocal.xzb.com', //jwt所面向的用户
            //     'iat' => $nowtime, //签发时间
            //     'nbf' => $nowtime + 10, //在什么时间之后该jwt才可用
            //     'exp' => $nowtime + 600, //过期时间-10min 
            //     'data' => [
            //         'userid' => 1,
            //         'username' => $username
            //     ]
            // ];
            $token = [
                'iss' => $issuer,                      //签发者
                'aud' => $face_users,                  //jwt所面向的用户
                'iat' => $nowtime,                     //签发时间
                'nbf' => $nowtime + 10,                //在什么时间之后该jwt才可用
                'exp' => $nowtime + 10 + $expiry_time, //过期时间 (单位：秒)
                'data' => [
                    'userid' => $userid,
                    'username' => $username
                ]
            ];
            $token['data']['other'] = $other_data;
            $jwt = JWT::encode($token, config('jwt.KEY'));
            // $res['result'] = 'success';
            // $res['jwt'] = $jwt;
            $res = $jwt;
            return $res;
    }


    /**
     * 查看签发的jwt的解密后的信息(php-jwt)(不需登陆)
     * api POST http://域名或IP:端口/index.php/test/Login/getJWTInfo
     * @param  string   X-Auth-Token   请求头X-Auth-Token的内容
     * @return inetger  $code     状态码,101
     * @return string   $msg      错误信息/提示信息
     */
    public function getJWTInfo()
    {
          $jwt = Request::instance()->header('X-Auth-Token'); // 获取头部信息
          // $jwt = isset($_SERVER['HTTP_X_TOKEN']) ? $_SERVER['HTTP_X_TOKEN'] : '';
          if (empty($jwt))
          {
              $res['msg'] = '请求头中没有X-Auth-Token的值';
              exit(json_encode($res));
              // exit;
          }
          try {
              JWT::$leeway = 60;
              $decoded = JWT::decode($jwt, config('jwt.KEY'), ['HS256']);
              $jwt_info = (array)$decoded;
              $res['jwt_info'] = $jwt_info;
          }
          catch(Exception $e)
          {
              $res['msg'] = '出错，请重试！';
          }
          echo json_encode($res);
    }

}
// 参考资料：
// PHP获取客户端和服务器端IP （ https://www.cnblogs.com/yaoyao1556/p/5818756.html ）