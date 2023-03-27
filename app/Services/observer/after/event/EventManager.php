<?php

namespace App\Services\observer\after\event;

use App\Services\observer\after\listener\EventListener;
use App\Services\observer\after\LotteryResult;

class EventManager
{

    private $listeners;

    static $EventType = ['MQ' => 1, 'Message' => 2];

    public function __construct(...$operations)
    {
        foreach ($operations as $operation) {
            $this->listeners[$operation] = [];
        }
    }

    public function subscribe($eventType, EventListener $listener)
    {
        $this->listeners[$eventType][get_class($listener)] = $listener;
    }

    public function unsubscribe($eventType, EventListener $listener)
    {
        unset($this->listeners[$eventType][get_class($listener)]);
    }

    public function notify($eventType, LotteryResult $result)
    {
        foreach ($this->listeners[$eventType] as $listener) {
            $listener->doEvent($result);
        }
    }
}
