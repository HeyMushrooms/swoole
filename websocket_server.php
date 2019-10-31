<?php
/**
 * Created by PhpStorm.
 * User: DWJ
 * Date: 2019/10/31
 * Time: 14:08
 */
$server = new Swoole\WebSocket\Server("0.0.0.0", 9503);

//监听wecSocket连接打开事件
$server->on('open', function (Swoole\WebSocket\Server $server, $request) {
    echo "server: handshake success with fd{$request->fd}\n";
});

$server->on('message', function (Swoole\WebSocket\Server $server, $frame) {
    echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
    $server->push($frame->fd, "this is server");
});

$server->on('close', function ($ser, $fd) {
    echo "client {$fd} closed\n";
});

$server->start();