<?php
/**
 * Created by PhpStorm.
 * User: DWJ
 * Date: 2019/10/29
 * Time: 14:56
 */
$client = new swoole_client(SWOOLE_SOCK_UDP);

$res = $client->connect('47.106.204.223',9502);
if(!$res){
    $client->close();
    echo '连接失败';
    exit;
}
//php cli常量
fwrite(STDOUT,'请输入信息:');
$msg = trim(fgets(STDIN));

//发送信息给tcp service服务器
$client->send($msg);

//接受来自server的数据
$result = $client->recv();
echo $result;