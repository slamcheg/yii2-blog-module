<?php
require dirname(__DIR__) . "/vendor/autoload.php";
require dirname(__DIR__) . "/vendor/yiisoft/yii2/Yii.php";

$application = new yii\console\Application([
    'id' => 'yii-console',
    'basePath' => __DIR__,
]);

$application->set('db', [
    'class' => '\yii\db\Connection',
    'dsn' => 'mysql:host=127.0.0.1;dbname=blog',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
]);