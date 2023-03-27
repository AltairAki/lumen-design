<?php

namespace App\Services\bridge\channel;

use App\Services\bridge\mode\IPayMode;

abstract class Pay
{

    protected $payMode;

    public function __construct(IPayMode $mode)
    {
        $this->payMode = $mode;
    }

    public abstract function transfer($uId, $tradId, $amount);


}
