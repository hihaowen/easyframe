<?php

namespace Core\Libs;

use Core\Libs\Router\Register;

/**
 * 路由注册器
 *
 * Class RouteRegister
 *
 * @package Core\Libs
 *
 * @author haowenzhi <haowenzhi@cmcm.com>
 */
class RouteRegister implements Register
{
    private $routes = [];

    /**
     * 设置路由
     *
     * @param $method
     * @param $arguments
     * @return void
     */
    public function __call($method, $arguments)
    {
        $method = strtolower($method);

        $methods = ['get', 'post', 'options'];

        if (! in_array($method, $methods)) {
            throw new \InvalidArgumentException('不支持的HTTP请求方法', -1);
        }

        if (count($arguments) !== 2) {
            throw new \InvalidArgumentException('uri必须填写', -1);
        }

        list($uri, $action) = $arguments;

        $uri = $this->formatUri($uri);

        $this->routes[$uri][$method] = $action;
    }

    public function getAction($uri, $method)
    {
        $method = strtolower($method);

        $uri = $this->formatUri($uri);

        return isset($this->routes[$uri][$method]) ? $this->routes[$uri][$method] : null;
    }

    /**
     * 格式化 uri
     *
     * @param $uri
     * @return string
     */
    private function formatUri($uri)
    {
        return '/' . trim($uri, '/') . '/';
    }
}
