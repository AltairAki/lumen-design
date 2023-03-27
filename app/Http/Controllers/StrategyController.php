<?php

namespace App\Http\Controllers;

use App\Services\strategy\Context;
use App\Services\strategy\impl\MJCouponDiscount;
use App\Services\strategy\impl\NYGCouponDiscount;
use App\Services\strategy\impl\ZJCouponDiscount;
use App\Services\strategy\impl\ZKCouponDiscount;

/**
 * 策略模式：模拟多种营销类型优惠券，折扣金额计算策略场景
 *
 * 策略模式将各个策略方案的实现都交给具体对象实现，然后根据不同的策略传不同的策略对象。（实现了一族算法对象，客户端替换后无感知）
 */
class StrategyController extends Controller
{

    // 优化前代码
    public function before($type, $typeValue, $skuPrice, $typePrice)
    {
        // 1. 直减券
        if (1 == $type) {
            return $skuPrice - $typeValue;
        }
        // 2. 满减券
        if (2 == $type) {
            if ($skuPrice < $typePrice) return $skuPrice;
            return $skuPrice - $typeValue;
        }
        // 3. 折扣券
        if (3 == $type) {
            return $skuPrice * $typeValue;
        }
        // 4. n元购
        if (4 == $type) {
            return $typeValue;
        }
        return 0.00;
    }

    // 满减
    public function mj()
    {
        $context = new Context(new MJCouponDiscount);
        $ret = $context->discountAmount(['price' => 0.5, 'discount' => 2], 1);
        return response(json_encode(['discount_amount' => $ret]));
    }

    // 直减
    public function zj()
    {
        $context = new Context(new ZJCouponDiscount);
        $ret = $context->discountAmount(9, 1);
        return response(json_encode(['discount_amount' => $ret]));
    }

    // n元购
    public function nyg()
    {
        $context = new Context(new NYGCouponDiscount());
        $ret = $context->discountAmount(8.88, 9);
        return response(json_encode(['discount_amount' => $ret]));
    }

    // 直减
    public function zk()
    {
        $context = new Context(new ZKCouponDiscount());
        $ret = $context->discountAmount(0.98, 100);
        return response(json_encode(['discount_amount' => $ret]));
    }
}
