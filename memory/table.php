<?php
/**
 * Created by PhpStorm.
 * User: DWJ
 * Date: 2019/12/9
 * Time: 11:28
 */

$table = new Swoole\Table(1024);

//内存表增加一行
$table->column('id',$table::TYPE_INT,8);
$table->column('name',$table::TYPE_STRING,64);
$table->column('age',$table::TYPE_INT,8);
$table->create();

$table->set('1',[1,'dwj','11']);
$res = $table->get('1');
var_dump($res);