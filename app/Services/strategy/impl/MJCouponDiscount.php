<?php

namespace App\Services\strategy\impl;

use App\Services\strategy\ICouponDiscount;

class MJCouponDiscount implements ICouponDiscount
{
    /**
     * 满减计算
     * 1. 判断满足x元后-n元，否则不减
     * 2. 最低支付金额1元
     */
    public function discountAmount($couponInfo, $skuPrice)
    {

        if (!isset($couponInfo['price']) || !isset($couponInfo['discount'])) die('invalid param');

        $x = $couponInfo['price'];
        $o = $couponInfo['discount'];

        // 小于商品金额条件的，直接返回商品原价
        if (bccomp($skuPrice, $x) < 0) return $skuPrice;
        // 减去优惠金额判断
        $discountAmount = bcsub($skuPrice, $o, 2);
        if ($discountAmount < 1) return 1.00;

        return $discountAmount;
    }
}
