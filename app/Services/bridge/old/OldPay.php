<?php

namespace App\Services\bridge\old;

class OldPay
{
    public function doPay($uId, $tradeId, $amount, $channelType, $modeType)
    {
        // 微信支付
        if (1 == $channelType) {
            dump("模拟微信渠道支付划账开始。uId：{$uId} tradeId：{$tradeId} amount：{$amount}");
            if (1 == $modeType) {
                dump("密码支付，风控校验环境安全");
            } else if (2 == $modeType) {
                dump("人脸支付，风控校验脸部识别");
            } else if (3 == $modeType) {
                dump("指纹支付，风控校验指纹信息");
            }
        } // 支付宝支付
        else if (2 == $channelType) {
            dump("模拟支付宝渠道支付划账开始。uId：{$uId} tradeId：{$tradeId} amount：{$amount}");
            if (1 == $modeType) {
                dump("密码支付，风控校验环境安全");
            } else if (2 == $modeType) {
                dump("人脸支付，风控校验脸部识别");
            } else if (3 == $modeType) {
                dump("指纹支付，风控校验指纹信息");
            }
        }
        return true;
    }
}
