<?php

namespace App\Services\state\after;

class Result
{
    private $code; // 编码
    private $info; // 描述

    public function __construct(string $code, string $info)
    {
        $this->code = $code;
        $this->info = $info;
    }

    public function toString()
    {
        return json_encode(get_object_vars($this), JSON_UNESCAPED_UNICODE);
    }
}
