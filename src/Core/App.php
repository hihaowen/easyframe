<?php

namespace Core;

use Core\Libs\HttpRequest;
use Core\Libs\Router\Parse as RouteParser;

/**
 * 应用启动器
 *
 * Class App
 *
 * @package Core
 *
 * @author haowenzhi <haowenzhi@cmcm.com>
 */
class App
{
    /**
     * 运行
     *
     * @param RouteParser $parser
     */
    public function run(RouteParser $parser)
    {
        try {
            $parser->parse(HttpRequest::getInstance());

            $method = $parser->method();

            $class = $parser->class();

            if (! class_exists($class)) {
                throw new \RuntimeException('不存在的对象: '. $class);
            }

            $class = new $class();

            if (! method_exists($class, $method)) {
                throw new \RuntimeException('不存在的对象方法: '. $method);
            }

            $class->$method();
        } catch (\Exception $e) {
            echo 'Error[' . $e->getCode() . ']: ' . $e->getMessage();
        }

        exit(0);
    }
}
