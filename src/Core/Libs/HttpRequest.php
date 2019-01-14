<?php

namespace Core\Libs;

use Core\Libs\Http\HttpRequest as HttpRequestInterface;

/**
 * HTTP 请求
 *
 * Class HttpRequest
 *
 * @package Core\Libs
 *
 * @author haowenzhi <haowenzhi@cmcm.com>
 */
class HttpRequest implements HttpRequestInterface
{
    private $uri;

    private $posts = [];

    private $gets = [];

    private $method;

    private static $instance;

    /**
     * @return HttpRequest
     */
    public static function getInstance()
    {
        if (is_null(self::$instance) || ! (self::$instance instanceof HttpRequestInterface))
        {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct()
    {
        $this->uri = $_SERVER['REQUEST_URI'] ?: '';

        $this->posts = $_POST;

        $this->gets = $_GET;

        $this->method = $_SERVER['REQUEST_METHOD'] ?: '';
    }

    public function uri()
    {
        return $this->uri;
    }

    public function posts()
    {
        return $this->posts;
    }

    public function gets()
    {
        return $this->gets;
    }

    public function method()
    {
        return $this->method;
    }

    public function getHeader($name)
    {
        return $_SERVER[$name] ?: '';
    }
}
