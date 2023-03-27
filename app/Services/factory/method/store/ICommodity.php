<?php

namespace App\Services\factory\method\store;

interface ICommodity
{
    public function sendCommodity(string $uId, string $commodityId, string $bizId, array $extMap);
}
