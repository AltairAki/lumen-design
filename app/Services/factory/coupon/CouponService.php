<?php

namespace App\Services\factory\coupon;

class CouponService
{
    public function sendCoupon(string $uId, string $couponNumber, string $uuid): CouponResult
    {
        dump("模拟发放优惠券一张：$uId,$couponNumber,$uuid");
        return new CouponResult("0000", "发放成功");
    }
}
