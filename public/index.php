<?php

error_reporting(E_ALL);

// 定义根路径
define('ROOT_PATH', dirname(dirname(__FILE__)));

// 引入Composer
require_once ROOT_PATH . "/vendor/autoload.php";

// 引入框架加载器
require_once ROOT_PATH . '/src/Core/Psr/Psr4AutoLoader.php';
$classLoader = new \Core\Psr\Psr4AutoLoader();
$classLoader->register();

// 增加自动加载
$classLoader->addPrefix('\\Core', ROOT_PATH . '/src/Core');

// 路由注册
$routeRegister = new \Core\Libs\RouteRegister();
$routeRegister->get('/api/test/v1', \EasyShop\Controller\Api\Test::class . '@v1');
$routeRegister->get('/api/test', \EasyShop\Controller\Api\Test::class);

// 运行
(new \Core\App())->run(new \Core\Libs\RouteParser($routeRegister));
