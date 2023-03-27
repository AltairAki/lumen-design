<?php

namespace App\Services\factory\method\store\impl;

use App\Services\factory\goods\DeliverReq;
use App\Services\factory\method\store\ICommodity;
use http\Exception\RuntimeException;

class GoodsCommodityService implements ICommodity
{
    public function sendCommodity(string $uId, string $commodityId, string $bizId, array $extMap)
    {
        $deliverReq = new DeliverReq();
        $deliverReq->setUserName($this->queryUserName($uId));
        $deliverReq->setUserPhone($this->queryUserPhoneNumber($uId));
        $deliverReq->setSku($commodityId);
        $deliverReq->setOrderId($bizId);

        $deliverReq->setConsigneeUserName($extMap["consigneeUserName"]);
        $deliverReq->setConsigneeUserPhone($extMap["consigneeUserPhone"]);
        $deliverReq->setConsigneeUserAddress($extMap["consigneeUserAddress"]);

        $isSuccess = app('goods')->deliverGoods($deliverReq);

        dump("请求参数[实物商品] => uId：{$uId} commodityId：{$commodityId} bizId：{$bizId} extMap：" . json_encode($extMap));
        dump("测试结果[实物商品]：" . $isSuccess);

        if (!$isSuccess) throw new RuntimeException("实物商品发放失败");
    }

    private function queryUserName(string $uId)
    {
        return "花花";
    }

    private function queryUserPhoneNumber(string $uId)
    {
        return "15200101232";
    }

}
