<?php

namespace App\Services\strategy\impl;

use App\Services\strategy\ICouponDiscount;

class NYGCouponDiscount implements ICouponDiscount
{

    /**
     * n元购购买
     * 1. 无论原价多少钱都固定金额购买
     */
    public function discountAmount($couponInfo, float $skuPrice)
    {
        return bccomp($couponInfo, $skuPrice) > 0 ? $skuPrice : round($couponInfo, 2);
    }
}
