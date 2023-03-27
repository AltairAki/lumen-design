<?php

namespace App\Services\observer\after;

class LotteryResult
{
    // 用户ID
    private $uId;

    // 摇号信息
    private $msg;

    // 业务时间
    private $dateTime;

    public function __construct($uId, $msg, $dateTime)
    {
        $this->uId = $uId;
        $this->msg = $msg;
        $this->dateTime = $dateTime;
    }

    public function getUId()
    {
        return $this->uId;
    }

    public function setUId(string $uId)
    {
        $this->uId = $uId;
    }

    public function getMsg()
    {
        return $this->msg;
    }

    public function setMsg(string $msg)
    {
        $this->msg = $msg;
    }

    public function getDateTime()
    {
        return $this->dateTime;
    }

    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;
    }
}
