<?php

namespace App\Services\adapter\after\impl;

use App\Services\adapter\after\OrderAdapterService;
use App\Services\adapter\base\service\OrderService;


/**
 * 内部订单，判断首单逻辑
 */
class InsideOrderServiceImpl implements OrderAdapterService
{

    private $orderService;

    public function __construct()
    {
        $this->orderService = new OrderService();
    }

    public function isFirst(string $uId)
    {
        return $this->orderService->queryUserOrderCount($uId) <= 1;
    }
}
