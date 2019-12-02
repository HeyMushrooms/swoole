<?php
/**
 * Created by PhpStorm.
 * User: DWJ
 * Date: 2019/12/2
 * Time: 9:42
 */
$process = new swoole_process(function(swoole_process $pro){
//echo 111;
    $pro->exec('/usr/local/bin/php',getcwd().'/http_server.php');
},true);

$pid = $process->start();
echo $pid;

swoole_process::wait();