<?php

namespace App\Services\bridge\mode;

class PayFaceMode implements IPayMode
{
    public function security(string $uId): bool
    {
        dump(("刷脸支付，风控校验脸部识别"));
        return true;
    }
}
