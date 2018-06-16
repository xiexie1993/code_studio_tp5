<?php

namespace app\push\controller;

use think\worker\Server;

class Worker extends Server
{
    protected $socket = 'websocket://server3.tp5.com:2346';

    /**
     * 收到信息
     * @param $connection
     * @param $data
     */
    public function onMessage($connection, $data)
    {
        // 客户端传递的是json数据
        // $connection->send("{'type':'debug_return_person','data':'".$data."'}");
        $message_data = json_decode($data, true);
        if(!$message_data)
        {
            $connection->send("{'type':'error','data':'message_data is null'}");
            return ;
        }
        // 根据类型执行不同的业务
        switch($message_data['type'])
        {
            // 客户端回应服务端的心跳
            case 'pong':
                $connection->send("{'type':'ping','data':'retutn pong'}");
                return ;        
            
            // 客户端登录 message格式: {type:login, name:xx, room_id:1} ，添加到客户端，广播给所有客户端xx进入聊天室
            case 'login':
                // $connection->send("{'type':'debug_return_person','data':'debug login'}");
            	if(!isset($message_data['room_id']))
                {
                    throw new \Exception("\$message_data['room_id'] not set. client_ip:{$_SERVER['REMOTE_ADDR']} \$message:$message");
                }
                // 判断当前客户端是否已经验证,即是否设置了uid
                
                if(!isset($connection->uid))
			    {
			       // 没验证的话把第一个包当做uid（这里为了方便演示，没做真正的验证）
			       $connection->uid = $message_data['client_name'];
			       /* 保存uid到connection的映射，这样可以方便的通过uid查找connection，
			        * 实现针对特定uid推送数据
			        */
			    	$worker = $this->worker;
			    	foreach($worker->connections as $conn)
				    {
				        $conn->send("{'type':'return_all','data':'".$message_data['client_name']."登陆成功'}");
				    }
			    }
                return;
            // 私聊
            case 'say':
                // $connection->send("{'type':'debug_return_person','data':'default type say'}");
                if($message_data['content']== '吃饭了吗？')
                {
                        $ret_data = '还没呢，你呢？';
                }
                elseif ($message_data['content']== '那又怎样！') 
                {
                    $ret_data = '没怎样！';
                }
                else
                {
                    $ret_data = '那又怎样！';
                }
                $connection->send("{'type':'return_person','data':'".$ret_data."'}");
                return;
            // 广播
            case 'broadcast':
                // $connection->send("{'type':'debug_return_person','data':'default type broadcast'}");
                $worker = $this->worker;
                foreach($worker->connections as $conn)
                {
                    $conn->send("{'type':'return_broadcast_all','data':'".$message_data['client_name']."（广播）：".$message_data['content']."'}");
                }
                return;
            default:
                $connection->send("{'type':'return_person','data':'default type'}");
                return;
        }
    }

    /**
     * 当连接建立时触发的回调函数
     * @param $connection
     */
    public function onConnect($connection)
    {
        // $worker = $this->worker;
        // foreach($worker->connections as $conn)
        // {
        //     $conn->send("{'type':'login','data':'欢迎光临!'}");
        // }
        $connection->send("{'type':'return_person','data':'欢迎光临!'}");
    }
    /**
	 * 向所有验证的用户发送消息
     */
    public function sendAllMessage(){
    	global $worker;
	   	foreach($worker->uidConnections as $connection)
	   	{
	    	$connection->send($message);
	   	}
    }
    /**
     * 当连接断开时触发的回调函数
     * @param $connection
     */
    public function onClose($connection)
    {
        
    }

    /**
     * 当客户端的连接上发生错误时触发
     * @param $connection
     * @param $code
     * @param $msg
     */
    public function onError($connection, $code, $msg)
    {
        echo "error $code $msg\n";
    }

    /**
     * 每个进程启动
     * @param $worker
     */
    public function onWorkerStart($worker)
    {

    }
}