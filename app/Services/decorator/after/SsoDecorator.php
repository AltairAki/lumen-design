<?php

namespace App\Services\decorator\after;

use App\Services\decorator\base\HandlerInterceptor;

/**
 * 自己实现的 sso
 */
abstract class SsoDecorator implements HandlerInterceptor
{

    private $handlerInterceptor;

    public function __construct(HandlerInterceptor $handlerInterceptor)
    {
        $this->handlerInterceptor = $handlerInterceptor;
    }

    public function preHandle(string $request, string $response, object $handler): bool
    {
        return $this->handlerInterceptor->preHandle($request, $response, $handler);
    }
}
