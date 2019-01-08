<?php

namespace Core\Libs\Router;

use Core\Libs\Http\HttpRequest;

/**
 * Interface Parse
 *
 * @package Core\Libs\Router
 */
interface Parse
{
    /**
     * 解析请求
     *
     * @param HttpRequest $request
     * @return void
     */
    public function parse(HttpRequest $request);

    /**
     * 获取类名 (带命名空间)
     *
     * @return string|null
     */
    public function class();

    /**
     * 获取类方法名
     *
     * @return string|null
     */
    public function method();
}
