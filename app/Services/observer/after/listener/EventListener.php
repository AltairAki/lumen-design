<?php

namespace App\Services\observer\after\listener;

use App\Services\observer\after\LotteryResult;

interface EventListener
{
    function doEvent(LotteryResult $result);
}
