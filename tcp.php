<?php
/**
 * Created by PhpStorm.
 * User: DWJ
 * Date: 2019/10/24
 * Time: 13:55
 */
//创建Server对象，监听 127.0.0.1:9501端口
$serv = new Swoole\Server("127.0.0.1", 9501);

$serv->set(
    [
        'worker_num'=>8, //worker进程数 cpu 1-4 倍
        'max_request'=> 1000.
    ]
);
//$fd 客户端连接的唯一标识
// $rector_id //线程
//监听连接进入事件
$serv->on('Connect', function ($serv, $fd ,$rector_id) {
    echo "Client:".$rector_id.'-'.$fd.'-'." Connect.\n";
});

//监听数据接收事件
$serv->on('Receive', function ($serv, $fd, $from_id, $data) {
    $serv->send($fd, "Server: ".$data);
});

//监听连接关闭事件
$serv->on('Close', function ($serv, $fd) {
    echo "Client: Close.\n";
});

//启动服务器
$serv->start();