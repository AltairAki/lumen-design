<?php

namespace App\Services\bridge\mode;

interface IPayMode
{
    public function security(string $uId): bool;
}
