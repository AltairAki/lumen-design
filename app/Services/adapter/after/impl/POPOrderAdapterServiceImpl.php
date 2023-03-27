<?php

namespace App\Services\adapter\after\impl;

use App\Services\adapter\after\OrderAdapterService;
use App\Services\adapter\base\service\POPOrderService;

/**
 * 第三方订单，判断首单逻辑
 */
class POPOrderAdapterServiceImpl implements OrderAdapterService
{
    private $popOrderService;

    public function __construct()
    {
        $this->popOrderService = new POPOrderService();
    }

    public function isFirst(string $uId)
    {
        // 根据第三方提供接口判断是否为首单
        return $this->popOrderService->isFirstOrder($uId);
    }
}
