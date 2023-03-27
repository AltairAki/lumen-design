<?php

namespace App\Services\decorator\before;

use App\Services\decorator\base\SsoInterceptor;

class LoginSsoDecorator extends SsoInterceptor
{
    private static $authMap = [
        'huahua' => "queryUserInfo",
        'doudou' => "queryUserInfo",
    ];

    // 继承加强功能
    public function preHandle(string $request, string $response, object $handler): bool
    {
        // 模拟获取cookie
        $ticket = substr($request, 1, 8);
        // 模拟校验
        $success = strcmp($ticket, 'success');
        if (!$success) return false;


        $userId = substr($request, 8);
        $method = static::$authMap[$userId];

        // 模拟方法校验
        return strcmp('queryUserInfo', $method);
    }
}
