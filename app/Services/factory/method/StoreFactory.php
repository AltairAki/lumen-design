<?php

namespace App\Services\factory\method;

use App\Services\factory\method\store\ICommodity;
use App\Services\factory\method\store\impl\CardCommodityService;
use App\Services\factory\method\store\impl\CouponCommodityService;
use App\Services\factory\method\store\impl\GoodsCommodityService;
use http\Exception\RuntimeException;

class StoreFactory
{
    /**
     * 奖品类型方式实例化
     * @param int $commodityType    奖品类型
     * @return CardCommodityService|CouponCommodityService|GoodsCommodityService|null 实例化对象
     */
    public function getCommodityService(int $commodityType)
    {
        if (null == $commodityType) return null;
        if (1 == $commodityType) return new CouponCommodityService();
        if (2 == $commodityType) return new GoodsCommodityService();
        if (3 == $commodityType) return new CardCommodityService();
        throw new RuntimeException("不存在的奖品服务类型");
    }

    /**
     * 奖品类信息方式实例化
     *
     * @param ICommodity $clazz 奖品类
     * @return ICommodity|null  实例化对象
     */
    public function getCommodityService2(ICommodity $clazz)
    {
        if (null == $clazz) return null;
        return $clazz;
    }

}
