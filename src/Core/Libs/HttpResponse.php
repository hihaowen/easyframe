<?php

namespace Core\Libs;

use Core\Libs\Http\HttpResponse as HttpResponseInterface;

/**
 * Http 响应
 *
 * Class HttpResponse
 *
 * @package Core\Libs
 *
 * @author haowenzhi <haowenzhi@cmcm.com>
 */
class HttpResponse implements HttpResponseInterface
{
    public function json(array $dataSet)
    {
        $json = json_encode($dataSet);

        if (JSON_ERROR_NONE != json_last_error()) {
            throw new \InvalidArgumentException('格式化Json失败', -1);
        }

        return $json;
    }

    public function text($string)
    {
        return strval($string);
    }

    public function setHeader($name, $value, $code = null)
    {
        header("{$name}: {$value}", false, $code);
    }
}
