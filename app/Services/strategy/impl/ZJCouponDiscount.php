<?php

namespace App\Services\strategy\impl;

use App\Services\strategy\ICouponDiscount;

class ZJCouponDiscount implements ICouponDiscount
{

    /**
     * 直减计算
     * 1. 使用商品价格减去优惠价格
     * 2. 最低支付金额1元
     */
    public function discountAmount($couponInfo, float $skuPrice)
    {
        if (!is_numeric($couponInfo)) die("优惠价格必须是数字");
        $discountAmount = bcsub($skuPrice, $couponInfo, 2);
        if ($discountAmount < 0) return 1.00;
        return $discountAmount;
    }
}
