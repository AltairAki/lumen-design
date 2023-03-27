<?php

namespace App\Services\factory\method\store\impl;

use App\Services\factory\method\store\ICommodity;
use http\Exception\RuntimeException;

class CouponCommodityService implements ICommodity
{
    public function sendCommodity(string $uId, string $commodityId, string $bizId, array $extMap)
    {
        $couponResult = app('coupon')->sendCoupon($uId, $commodityId, $bizId);
        dump("请求参数[优惠券] => uId：{$uId} commodityId：{$commodityId} bizId：{$bizId} extMap：" . json_encode($extMap));
        dump("测试结果[优惠券]：" ,$couponResult);
        if (strcmp("0000", $couponResult->getCode())) throw new RuntimeException($couponResult->getInfo());
    }
}
