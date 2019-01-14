<?php

namespace Core\Libs\Http;

/**
 * Interface HttpRequest
 *
 * @package Core\Libs\Http
 */
interface HttpRequest
{
    /**
     * @return string
     */
    public function uri();

    /**
     * Post 请求数据
     *
     * @return array
     */
    public function posts();

    /**
     * Get 请求数据
     */
    public function gets();

    /**
     * 请求方法
     *
     * @return string
     */
    public function method();

    /**
     * 获取指定 Header 值
     *
     * @param $name
     * @return string|null
     */
    public function getHeader($name);
}
