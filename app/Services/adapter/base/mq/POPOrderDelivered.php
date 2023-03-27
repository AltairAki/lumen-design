<?php

namespace App\Services\adapter\base\mq;

class POPOrderDelivered
{
    private $uId;     // 用户ID
    private $orderId; // 订单号
    private $orderTime; // 下单时间
    private $sku;       // 商品
    private $skuName;   // 商品名称
    private $decimal; // 金额

    public function getuId()
    {
        return $this->uId;
    }

    public function setuId(string $uId)
    {
        $this->uId = $uId;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function setOrderId(string $orderId)
    {
        $this->orderId = $orderId;
    }

    public function getOrderTime()
    {
        return $this->orderTime;
    }

    public function setOrderTime($orderTime)
    {
        $this->orderTime = $orderTime;
    }

    public function getSku()
    {
        return $this->sku;
    }

    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    public function getSkuName()
    {
        return $this->skuName;
    }

    public function setSkuName(string $skuName)
    {
        $this->skuName = $skuName;
    }

    public function getDecimal()
    {
        return $this->decimal;
    }

    public function setDecimal(float $decimal)
    {
        $this->decimal = $decimal;
    }

    public function toString()
    {
        // JSON_UNESCAPED_UNICODE  json_encode 函数的第二个可选参数，保存时保存 UNICODE 码，这样中文就会原样保存
        return json_encode(get_object_vars($this));
    }
}
