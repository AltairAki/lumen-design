<?php

namespace App\Services\strategy\impl;

use App\Services\strategy\ICouponDiscount;

class ZKCouponDiscount implements ICouponDiscount
{

    /**
     * 折扣计算
     * 1. 使用商品价格乘以折扣比例，为最后支付金额
     * 2. 保留两位小数
     * 3. 最低支付金额1元
     */
    public function discountAmount($couponInfo, float $skuPirce)
    {
        if (!is_numeric($couponInfo) || $couponInfo >= 1) die("优惠价格必须是数字或小于1");
        $discountAmount = bcmul($couponInfo, $skuPirce, 2);
        if ($discountAmount < 1) return 1.00;
        return $discountAmount;
    }
}
