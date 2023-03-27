<?php

namespace App\Services\strategy;

class Context
{
    private $couponDiscount;

    public function __construct(ICouponDiscount $couponDiscount)
    {
        $this->couponDiscount = $couponDiscount;
    }

    public function discountAmount($couponInfo, $skuPrice)
    {
        return $this->couponDiscount->discountAmount($couponInfo, $skuPrice);
    }
}
