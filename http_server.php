<?php
/**
 * Created by PhpStorm.
 * User: DWJ
 * Date: 2019/10/29
 * Time: 16:04
 */
    $http =  new swoole_http_server('0.0.0.0',9503);

    $http->set(
        [
            'enable_static_handler'=>true,
            'document_root' => './static/'
        ]
    );

    $http->on('request',function($request,$response){
        $get = $request->get;
        var_dump($get);
        $response->end('get='.json_encode($get).'<h1>HTTP_SERVER</h1>');
    });
    $http->start();