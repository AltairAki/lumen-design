<?php

namespace App\Services\factory\method\store\impl;

use App\Services\factory\method\store\ICommodity;

class CardCommodityService implements ICommodity
{

    public function sendCommodity(string $uId, string $commodityId, string $bizId, array $extMap)
    {
        $mobile = $this->queryUserMobile($uId);
        app('iQiYiCard')->grantToken($mobile, $bizId);
        dump("请求参数[爱奇艺兑换卡] => uId：$uId commodityId：$commodityId bizId：bizId extMap：" . json_encode($extMap));
        dump("测试结果[爱奇艺兑换卡]：success");
    }

    private function queryUserMobile(string $uId)
    {
        return "15200101232";
    }
}
