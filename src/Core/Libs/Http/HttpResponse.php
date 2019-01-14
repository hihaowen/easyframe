<?php

namespace Core\Libs\Http;

/**
 * Interface HttpResponse
 *
 * @package Core\Libs\Http
 */
interface HttpResponse
{
    /**
     * 格式化为Json形式
     *
     * @param array $dataSet
     * @return string
     */
    public function json(array $dataSet);

    /**
     * 格式化为文本形式
     *
     * @param $string
     * @return string
     */
    public function text($string);

    /**
     * 设置 Http Header 信息
     *
     * @param $name
     * @param $value
     * @param int|null $code
     * @return void
     */
    public function setHeader($name, $value, $code = null);
}
