<?php

use Dotenv\Dotenv;

$path = dirname(__DIR__);
$dotenv = Dotenv::createUnsafeImmutable($path);
$dotenv->load();


 return [
        'database'=>[
            'host' => $_ENV['DB_HOST'],
            'port' => $_ENV['DB_PORT'],
            'dbname' => $_ENV['DB_NAME'],
            'username'=>$_ENV['DB_USER'],
            'pass'=>$_ENV['DB_PASS'],
            'charset'=> $_ENV['DB_CHARSET']
        ]
 ];

?>