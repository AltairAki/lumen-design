<?php

namespace App\Services\adapter\base\mq;

use Illuminate\Support\Arr;

class CreateAccount
{
    private $number;      // 开户编号
    private $address;     // 开户地
    private $accountDate;   // 开户时间
    private $desc;        // 开户描述

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber(string $number)
    {
        $this->number = $number;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress(string $address)
    {
        $this->address = $address;
    }

    public function getAccountDate()
    {
        return $this->accountDate;
    }

    public function setAccountDate($accountDate)
    {
        $this->accountDate = $accountDate;
    }

    public function getDesc()
    {
        return $this->desc;
    }

    public function setDesc(string $desc)
    {
        $this->desc = $desc;
    }

    public function toString()
    {
        // JSON_UNESCAPED_UNICODE  json_encode 函数的第二个可选参数，保存时保存 UNICODE 码，这样中文就会原样保存
        return json_encode(get_object_vars($this));
    }
}
