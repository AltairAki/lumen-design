<?php

namespace App\Services\bridge\channel;

class WxPay extends Pay
{
    public function transfer($uId, $tradId, $amount): string
    {
        dump("模拟微信渠道支付划账开始。uId：{$uId} tradeId：{$tradId} amount：{$amount}");

        $security = $this->payMode->security($uId);

        dump("模拟微信渠道支付风控校验。uId：{$uId} tradeId：{$tradId} security：{$security}");

        if (!$security) {
            dump("模拟微信渠道支付划账拦截。uId：{$uId} tradeId：{$tradId} amount：{$security}",);
            return "0001";
        }
        dump("模拟微信渠道支付划账成功。uId：{$uId} tradeId：{$tradId} amount：{$security}",);
        return "0000";
    }
}
