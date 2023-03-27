<?php

namespace App\Services\factory\card;

class IQiYiCardService
{
    public function grantToken(string $bindMobileNumber, string $cardId)
    {
        dump("模拟发放爱奇艺会员卡一张：{$bindMobileNumber}，{$cardId}");
    }
}
