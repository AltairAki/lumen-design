<?php

namespace App\Services\factory\goods;

class DeliverReq
{
    private $userName;              // 用户姓名
    private $userPhone;             // 用户手机
    private $sku;                   // 商品SKU
    private $orderId;               // 订单ID
    private $consigneeUserName;     // 收货人姓名
    private $consigneeUserPhone;    // 收货人手机
    private $consigneeUserAddress;  // 收获人地址

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function setUserName(string $userName)
    {
        $this->userName = $userName;
    }

    public function getUserPhone()
    {
        return $this->userPhone;
    }

    public function setUserPhone(string $userPhone)
    {
        $this->userPhone = $userPhone;
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

    public function getConsigneeUserName()
    {
        return $this->consigneeUserName;
    }

    public function setConsigneeUserName(string $consigneeUserName)
    {
        $this->consigneeUserName = $consigneeUserName;
    }

    public function getConsigneeUserPhone()
    {
        return $this->consigneeUserPhone;
    }

    public function setConsigneeUserPhone(string $consigneeUserPhone)
    {
        $this->consigneeUserPhone = $consigneeUserPhone;
    }

    public function getConsigneeUserAddress()
    {
        return $this->consigneeUserAddress;
    }

    public function setConsigneeUserAddress(string $consigneeUserAddress)
    {
        $this->consigneeUserAddress = $consigneeUserAddress;
    }
}
