<?php

namespace App\Services\observer\after\listener;

use App\Services\observer\after\LotteryResult;

class MessageEventListener implements EventListener
{
    public function doEvent(LotteryResult $result)
    {
        dump("给用户 {" . $result->getUId() . "} 发送短信通知(短信)：" . $result->getMsg());
    }
}
