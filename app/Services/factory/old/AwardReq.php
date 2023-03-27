<?php

namespace App\Services\factory\old;

class AwardReq
{
    private $uId;                 // 用户唯一ID
    private $awardType;          // 奖品类型(可以用枚举定义)；1优惠券、2实物商品、3第三方兑换卡(爱奇艺)
    private $awardNumber;         // 奖品编号；sku、couponNumber、cardId
    private $bizId;               // 业务ID，防重复
    private $extMap; // 扩展信息

    public function getuId()
    {
        return $this->uId;
    }

    public function setuId(string $uId)
    {
        $this->uId = $uId;
    }

    public function getAwardType()
    {
        return $this->awardType;
    }

    public function setAwardType(int $awardType)
    {
        $this->awardType = $awardType;
    }

    public function getAwardNumber()
    {
        return $this->awardNumber;
    }

    public function setAwardNumber(string $awardNumber)
    {
        $this->awardNumber = $awardNumber;
    }

    public function getBizId()
    {
        return $this->bizId;
    }

    public function setBizId(string $bizId)
    {
        $this->bizId = $bizId;
    }

    public function getExtMap(): array
    {
        return $this->extMap;
    }

    public function setExtMap(array $extMap)
    {
        if (!isset($extMap['consigneeUserName']) || !isset($extMap['consigneeUserPhone']) || !isset($extMap['consigneeUserAddress'])) {
            dd("缺少参数");
        }
        $this->extMap = $extMap;
    }
}
