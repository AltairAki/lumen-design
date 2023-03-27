<?php

namespace App\Http\Controllers;

use App\Services\bridge\channel\WxPay;
use App\Services\bridge\channel\ZfbPay;
use App\Services\bridge\mode\PayFaceMode;
use App\Services\bridge\mode\PayFingerprintMode;
use App\Services\bridge\old\OldPay;

/**
 * 桥接模式：多支付类型（密码、刷脸、指纹）多支付渠道（微信、支付宝）支付场景
 */
class BridgeController extends Controller
{
    /**
     * 优化前，双重 ifelse 判断 —— N * N 组合判断
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function before()
    {
        $pay = new OldPay();
        $pay->doPay("weixin_1092033111", "100000109893", 100, 1, 2);
        $pay->doPay("jlu19dlxo111", "100000109894", 100, 2, 3);

        return response("success");
    }

    /**
     * 桥接模式：用两个具体对象替换组合判断逻辑
     * @return void
     */
    public function pay()
    {
        $wxPay = new WxPay(new PayFaceMode());
        $wxPay->transfer("weixin_1092033111", "100000109893", 100);
        $zfbPay = new ZfbPay(new PayFingerprintMode());
        $zfbPay->transfer("jlu19dlxo111", "100000109894", 100);
    }

}
