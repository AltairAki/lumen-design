<?php

namespace App\Services\factory\coupon;

class CouponResult
{
    private $code; // 编码
    private $info; // 描述


    public function __construct(string $code, string $info)
    {
        $this->code = $code;
        $this->info = $info;
    }


    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code)
    {
        $this->code = $code;
    }

    public function getInfo(): string
    {
        return $this->info;
    }

    public function setInfo(string $info)
    {
        $this->info = $info;
    }
}
