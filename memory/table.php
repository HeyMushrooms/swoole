<?php
/**
 * Created by PhpStorm.
 * User: DWJ
 * Date: 2019/12/9
 * Time: 11:28
 */

$table = new Swoole\Table(1024);

//内存表增加一行
$table->column('id',TYPE_INT,8);
$table->column('name',TYPE_STRING);
$table->column('age',TYPE_INT);
$table->create();

$table->set('1',[1,'dwj','11']);
$res = $table->get('1');
var_dump($res);