<?php
/**
 * webSocket 优化
 * Created by PhpStorm.
 * User: DWJ
 * Date: 2019/11/8
 * Time: 14:05
 */
class  Ws{
    const HOST = '0.0.0.0';
    const PORT = '8812';

    public $ws = null;
    public function __construct()
    {
        $this->ws = new Swoole\WebSocket\Server(HOST,PORT);

        $this->ws->on('open',[$this,'onOpen']);
        $this->ws->on('message',[$this,'onMessage']);
        $this->ws->on('close',[$this,'onClose']);

        $this->ws->start();
    }

    /**
     * 监听ws连接事件
     * @param $ws
     * @param $request
     */
    public function onOpen($ws,$request){
        var_dump( "server: handshake success with fd{$request->fd}\n");
    }

    /**
     *
     * 监听消息事件
     * @param $ws
     * @param $frame
     */
    public function onMessage($ws,$frame){
        echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
        $ws->push($frame->fd, "this is server");
    }

    /**
     * 监听关闭事件
     * @param $ws
     * @param $fd
     */
    public function onClose($ws,$fd){
        echo "client {$fd} closed\n";
    }
}

$object =  new Ws();