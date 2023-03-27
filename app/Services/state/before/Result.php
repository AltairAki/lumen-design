<?php

namespace App\Services\state\before;

class Result
{
    private $code; // 编码
    private $info; // 描述

    public function __construct(string $code, string $info)
    {
        $this->code = $code;
        $this->info = $info;
    }
}
