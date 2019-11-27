<?php
/**
 * Created by PhpStorm.
 * User: DWJ
 * Date: 2019/11/27
 * Time: 10:47
 */

class CoroutineMysql{
    /**
     * @var \Swoole\Coroutine\MySQL
     */
    protected  $mysqlSwoole;
    public function __construct()
    {
        go(function (){
            $this->mysqlSwoole =  new Co\MySQL();
        });

    }

    public function query(){
        $this->mysqlSwoole->connect(
            [
                'host' => '47.106.204.223',
                'port' => 3306,
                'user' => 'root',
                'password' => 'root',
                'database' => 'swoole',
            ]
        );

        $res = $this->mysqlSwoole->query('SELECT * FROM user limit 10');
        if($res === false){
            echo '操作失败!';
            exit;
        }

        var_dump($res);

    }
}
$obj = new CoroutineMysql();
$obj->query();