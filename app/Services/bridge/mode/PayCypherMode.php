<?php

namespace App\Services\bridge\mode;

class PayCypherMode implements IPayMode
{
    public function security(string $uId): bool
    {
        dump(("密码支付，风控校验环境安全"));
        return true;
    }
}
