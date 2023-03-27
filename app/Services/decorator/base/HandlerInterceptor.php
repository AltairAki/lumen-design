<?php

namespace App\Services\decorator\base;

interface HandlerInterceptor
{
    function preHandle(string $request, string $response, object $handler): bool;
}
