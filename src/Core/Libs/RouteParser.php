<?php

namespace Core\Libs;

use Core\Libs\Http\HttpRequest;
use Core\Libs\Router\Parse;
use Core\Libs\Router\Register;

/**
 * 默认的路由解析器
 *
 * Class RouteParser
 *
 * @package Core\Libs
 *
 * @author haowenzhi <haowenzhi@cmcm.com>
 */
class RouteParser implements Parse
{
    protected $register;

    private $class;

    private $method;

    public function __construct(Register $register)
    {
        $this->register = $register;
    }

    public function parse(HttpRequest $request)
    {
        // 解析 class、method
        $action = $this->register->getAction(
            $request->uri(), $request->method()
        );

        $actionInfo = explode('@', $action);

        $class = $actionInfo[0] ?? null;

        $method = $actionInfo[1] ?? 'index';

        $this->class = $class;

        $this->method = $method;
    }

    public function class()
    {
        return $this->class;
    }

    public function method()
    {
        return $this->method;
    }
}
