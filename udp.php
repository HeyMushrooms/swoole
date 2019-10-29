<?php
/**
 * Created by PhpStorm.
 * User: DWJ
 * Date: 2019/10/29
 * Time: 14:41
 */

$serv = new swoole_server("0.0.0.0", 9502, SWOOLE_PROCESS, SWOOLE_SOCK_UDP);

//监听数据接收事件
$serv->on('Packet', function ($serv, $data, $clientInfo) {
    $serv->sendto($clientInfo['address'], $clientInfo['port'], "Server ".$data);
    var_dump($clientInfo);
});

//启动服务器
$serv->start();