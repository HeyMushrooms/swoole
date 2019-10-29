<?php
/**
 * Created by PhpStorm.
 * User: DWJ
 * Date: 2019/10/29
 * Time: 16:04
 */
    $http =  new swoole_http_server('0.0.0.0',9503);
    $http->on('request',function($request,$response){
       $response->end('<h1>HTTP_SERVER</h1>');
    });