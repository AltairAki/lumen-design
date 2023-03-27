<?php

namespace App\Services\observer\after;

use App\Services\observer\base\MinibusTargetService;

/**
 * 摇号服务实现
 */
class LotteryServiceImpl extends LotteryService
{
    private $minibusTargetService;

    public function __construct()
    {
        parent::__construct();
        $this->minibusTargetService = new MinibusTargetService();
    }

    public function doDraw(string $uId)
    {
        // 摇号
        $lottery = $this->minibusTargetService->lottery($uId);
        // 结果
        return new LotteryResult($uId, $lottery, date('Y-m-d H:i:s'));
    }
}
