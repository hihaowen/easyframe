<?php

namespace Core\Libs\Router;

/**
 * 路由注册
 *
 * Interface Register
 *
 * @package Core\Libs\Router
 */
interface Register
{
    /**
     * 根据 uri、method 获取 action
     *
     * @param $uri
     * @param $method
     * @return string|null
     */
    public function getAction($uri, $method);
}
