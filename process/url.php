<?php
/**
 * Created by PhpStorm.
 * User: DWJ
 * Date: 2019/12/2
 * Time: 16:28
 */
echo 'start:'.date('Y-m-d H:i:s').PHP_EOL;
$urls = [
    'http://www.baidu.com',
    'http://www.baida.com',
    'http://www.baids.com',
    'http://www.baidd.com',
    'http://www.baidv.com',
    'http://www.baidu.com?search=swoole',
    'http://www.baidu.com?search=laravel',

];
$workers = [];
for ($i = 0; $i<7; $i++){
    //开启子进程
    $process = new swoole_process(function(swoole_process $pro )use($i,$urls){
        //
       $res =  curlData($urls[$i]);
       echo $res.PHP_EOL;
    },true);
    $pid = $process->start();
    $workers[$pid] = $process;
}
foreach ($workers as $process){
   echo  $process->read();
}
function curlData($url){
    sleep(1);
    return $url.'---success'.PHP_EOL;
}
echo 'end:'.date('Y-m-d H:i:s');
