<?php

namespace App\Services\adapter\base\service;

use function dump;

class POPOrderService
{
    public function isFirstOrder(string $uId)
    {
        dump("POP商家，查询用户的订单是否为首单：{$uId}",);
        return true;
    }
}
