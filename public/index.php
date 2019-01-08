<?php

error_reporting(E_ALL);

// 定义根路径
define('ROOT_PATH', dirname(dirname(__FILE__)));

// 引入自动加载器
require_once ROOT_PATH . '/Core/Psr/Psr4AutoLoader.php';
$classLoader = new \Core\Psr\Psr4AutoLoader();
$classLoader->register();

// 增加自动加载
$classLoader->addPrefix('\\Core', ROOT_PATH . '/Core');
$classLoader->addPrefix('\\App', ROOT_PATH . '/App');

// 路由注册
$routeRegister = new \Core\Libs\RouteRegister();
$routeRegister->get('/api/test/v1', \App\Controller\Api\Test::class . '@v1');
$routeRegister->get('/api/test', \App\Controller\Api\Test::class);

$app = new \Core\App();
$app->run(new \Core\Libs\RouteParser($routeRegister));
