<?php

namespace app\http\controller;


use think\worker\Server;

class Worker extends Server
{
    protected $socket = 'websocket://tp51.workerman.demo.ning.com:2346';

    /**
     * Notes: 收到消息
     * Author: ning
     * Date: 2019/5/5
     * Time: 15:31
     * @param $connection
     * @param $data
     */
    public function onMessage($connection,$data)
    {
        // json数据
        $data = json_decode($data);
        $info = ['info'=>$data->info];
        $connection->send(json_encode($info));
    }

    /**
     * Notes: 当连接建立时触发的回调函数
     * Author: ning
     * Date: 2019/5/5
     * Time: 15:47
     * @param $connection
     */
    public function onConnect($connection)
    {
        
    }

    /**
     * Notes: 每个进程启动时会触发
     * Author: ning
     * Date: 2019/5/5
     * Time: 16:59
     * @param $worker
     */
    public function onWorkerStart($worker)
    {

    }

    /**
     * Notes: 当连接断开时触发的回调函数
     * Author: ning
     * Date: 2019/5/5
     * Time: 15:50
     * @param $connection
     */
    public function onClose($connection)
    {
        
    }

    /**
     * Notes: 当客户端的连接上发生错误时触发
     * Author: ning
     * Date: 2019/5/5
     * Time: 15:50
     * @param $connection
     * @param $code
     * @param $msg
     */
    public function onError($connection,$code,$msg)
    {
        echo "error $code $msg\n";
    }


}
