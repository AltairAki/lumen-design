<?php

namespace App\Services\adapter\base\service;

use function dump;

class OrderService
{
    public function queryUserOrderCount(string $userId)
    {
        dump("自营商家，查询用户的订单是否为首单：{$userId}",);
        return 10;
    }
}
