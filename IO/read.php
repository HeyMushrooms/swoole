<?php
/**
 * Created by PhpStorm.
 * User: DWJ
 * Date: 2019/11/27
 * Time: 9:50
 */

use Swoole\Coroutine\System;
$filename = __DIR__ . "/1.txt";
go(function () use ($filename)
{
    $r =  System::readFile($filename);
    var_dump($r);
});

go(function(){
   var_dump(Swoole\Coroutine\System::statvfs('/'));
});