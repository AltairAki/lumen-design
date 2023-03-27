<?php

namespace App\Services\decorator\base;

class SsoInterceptor implements HandlerInterceptor
{
    public function preHandle(string $request, string $response, object $handler): bool
    {
        // 模拟获取cookie
        $ticket = substr($request, 1, 8);
        // 模拟校验
        return strcmp('success', $ticket);
    }
}
