<?php

namespace App\Services\bridge\mode;

class PayFingerprintMode implements IPayMode
{
    public function security(string $uId): bool
    {
        dump("指纹支付，风控校验指纹信息");
        return true;
    }
}
