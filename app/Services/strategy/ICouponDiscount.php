<?php

namespace App\Services\strategy;

interface ICouponDiscount
{
    public function discountAmount($couponInfo, float $skuPrice);
}
