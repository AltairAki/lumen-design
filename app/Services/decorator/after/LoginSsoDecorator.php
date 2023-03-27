<?php

namespace App\Services\decorator\after;

use App\Services\decorator\base\HandlerInterceptor;

class LoginSsoDecorator extends SsoDecorator
{
    private static $authMap = [
        'huahua' => 'queryUserInfo',
        'doudou' => 'queryUserInfo',
    ];

    public function __construct(HandlerInterceptor $handlerInterceptor)
    {
        parent::__construct($handlerInterceptor);
    }

    public function preHandle(string $request, string $response, object $handler): bool
    {
        $success = parent::preHandle($request, $response, $handler);
        if (!$success) return false;
        $userId = substr($request, 8);
        $method = static::$authMap[$userId];
        dump("模拟单点登录方法访问拦截校验：{$userId} {$method}");
        // 模拟方法校验
        return strcmp("queryUserInfo", $method);
    }
}
