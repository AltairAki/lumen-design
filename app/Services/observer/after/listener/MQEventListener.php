<?php

namespace App\Services\observer\after\listener;

use App\Services\observer\after\LotteryResult;

class MQEventListener implements EventListener
{
    public function doEvent(LotteryResult $result)
    {
        dump("记录用户 {" . $result->getUId() . "} 摇号结果(MQ)：" . $result->getMsg());
    }
}
