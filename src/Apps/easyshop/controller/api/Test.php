<?php

namespace EasyShop\Controller\Api;

use Core\Libs\HttpResponse;

class Test
{
    public function v1()
    {
        $response = new HttpResponse();

        echo $response->json([
            'k1' => 'v1',
            'k2' => 'v2',
        ]);
    }

    public function index()
    {
        $response = new HttpResponse();

        echo $response->text("我是默认方法");
    }
}
