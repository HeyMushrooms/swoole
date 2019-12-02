<?php
/**
 * Created by PhpStorm.
 * User: DWJ
 * Date: 2019/12/2
 * Time: 9:42
 */
$process = new swoole_process(function(swoole_process $pro){

},true);

$pid = $process->start();
echo $pid;
