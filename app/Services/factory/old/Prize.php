<?php

namespace App\Services\factory\old;

use App\Services\factory\card\IQiYiCardService;
use App\Services\factory\coupon\CouponService;
use App\Services\factory\goods\DeliverReq;
use App\Services\factory\goods\GoodsService;

class Prize
{
    public function awardToUser(AwardReq $req): ?AwardRes
    {
        $reqJson = json_encode($req);
        $awardRes = null;
        try {
            dump("奖品发放开始{" . $req->getuId() . "}。req:{" . $reqJson . "}");
            // 按照不同类型方法商品[1优惠券、2实物商品、3第三方兑换卡(爱奇艺)]
            if ($req->getAwardType() == 1) {
                $couponService = new CouponService();
                $couponResult = $couponService->sendCoupon($req->getuId(), $req->getAwardNumber(), $req->getBizId());


                if (strcmp("0000", $couponResult->getCode())) {
                    $awardRes = new AwardRes("0000", "发放成功");
                } else {
                    $awardRes = new AwardRes("0001", $couponResult->getInfo());
                }
            } else if ($req->getAwardType() == 2) {
                $goodsService = new GoodsService();
                $deliverReq = new DeliverReq();
                $deliverReq->setUserName($this->queryUserName($req->getuId()));
                $deliverReq->setUserPhone($this->queryUserPhoneNumber($req->getuId()));
                $deliverReq->setSku($req->getAwardNumber());
                $deliverReq->setOrderId($req->getBizId());
                $deliverReq->setConsigneeUserName($req->getExtMap()['consigneeUserName']);
                $deliverReq->setConsigneeUserPhone($req->getExtMap()['consigneeUserPhone']);
                $deliverReq->setConsigneeUserAddress($req->getExtMap()['consigneeUserAddress']);
                $isSuccess = $goodsService->deliverGoods($deliverReq);
                if ($isSuccess) {
                    $awardRes = new AwardRes("0000", "发放成功");
                } else {
                    $awardRes = new AwardRes("0001", "发放失败");
                }
            } else if ($req->getAwardType() == 3) {
                $bindMobileNumber = $this->queryUserPhoneNumber($req->getuId());
                $iQiYiCardService = new IQiYiCardService();
                $iQiYiCardService->grantToken($bindMobileNumber, $req->getAwardNumber());
                $awardRes = new AwardRes("0000", "发放成功");
            }
            dump("奖品发放完成" . $req->getuId());
        } catch (\Exception $e) {
            dump("奖品发放失败{}。req:{}", $req->getuId(), $reqJson, $e);
            $awardRes = new AwardRes("0001", $e->getMessage());
        }
        return $awardRes;
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
