<?php

namespace App\Services\observer\after;

use App\Services\observer\after\event\EventManager;
use App\Services\observer\after\listener\MessageEventListener;
use App\Services\observer\after\listener\MQEventListener;

/**
 * 摇号服务抽象类，也可以创建接口，在用抽象类实现
 */
abstract class LotteryService
{
    private $eventManager;

    public function __construct()
    {
        $this->eventManager = new EventManager(EventManager::$EventType['MQ'], EventManager::$EventType['Message']);
        $this->eventManager->subscribe(EventManager::$EventType['MQ'], new MQEventListener());
        $this->eventManager->unsubscribe(EventManager::$EventType['MQ'], new MQEventListener());
        $this->eventManager->subscribe(EventManager::$EventType['Message'], new MessageEventListener());
    }

    public function draw(string $uId)
    {
        $lotteryResult = $this->doDraw($uId);
        $this->eventManager->notify(EventManager::$EventType['MQ'], $lotteryResult);
        $this->eventManager->notify(EventManager::$EventType['Message'], $lotteryResult);
        return $lotteryResult;
    }

    protected abstract function doDraw(string $uId);
}
