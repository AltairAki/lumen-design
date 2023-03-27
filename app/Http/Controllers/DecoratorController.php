<?php

namespace App\Http\Controllers;

use App\Services\decorator\base\SsoInterceptor;
use App\Services\decorator\before\LoginSsoDecorator as BeforeLoginSsoDecorator;
use App\Services\decorator\after\LoginSsoDecorator as AfterLoginSsoDecorator;

class DecoratorController extends Controller
{
    public function before()
    {
        $ssoDecorator = new BeforeLoginSsoDecorator();
        $request = "1successhuahua";
        $success = $ssoDecorator->preHandle($request, "ewcdqwt40liuiu", null);
        dump("登录校验：" . $request . ($success ? " 放行" : " 拦截"));
    }

    public function after()
    {
        $ssoDecorator = new AfterLoginSsoDecorator(new SsoInterceptor());
        $request = "1successhuahua";
        $success = $ssoDecorator->preHandle($request, "ewcdqwt40liuiu", null);
        dump("登录校验：" . $request . ($success ? " 放行" : " 拦截"));
    }
}
