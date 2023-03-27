<?php

namespace App\Services\adapter\base\mq;

class OrderMq
{
    private $uid;           // 用户ID
    private $sku;           // 商品
    private $orderId;       // 订单ID
    private $createOrderTime; // 下单时间

    public function getUid()
    {
        return $this->uid;
    }

    public function setUid(string $uid)
    {
        $this->uid = $uid;
    }

    public function getSku()
    {
        return $this->sku;
    }

    public function setSku(string $sku)
    {
        $this->sku = $sku;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function setOrderId(string $orderId)
    {
        $this->orderId = $orderId;
    }

    public function getCreateOrderTime()
    {
        return $this->createOrderTime;
    }

    public function setCreateOrderTime($createOrderTime)
    {
        $this->createOrderTime = $createOrderTime;
    }

    public function toString()
    {
        // JSON_UNESCAPED_UNICODE  json_encode 函数的第二个可选参数，保存时保存 UNICODE 码，这样中文就会原样保存
        return json_encode(get_object_vars($this));
    }
}
