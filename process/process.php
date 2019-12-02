<?php
/**
 * Created by PhpStorm.
 * User: DWJ
 * Date: 2019/12/2
 * Time: 9:42
 */
$process = new swoole_process(function(swoole_process $pro){
//echo 111;
    $pro->exec('/usr/local/bin/php',['/root/swoole/http_server.php']);
},false);

$pid = $process->start();
echo $pid.PHP_EOL;

swoole_process::wait();