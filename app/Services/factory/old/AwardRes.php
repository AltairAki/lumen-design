<?php

namespace App\Services\factory\old;

class AwardRes
{
    private $code; // 编码
    private $info; // 描述

    public function AwardRes(string $code, string $info)
    {
        $this->code = $code;
        $this->info = $info;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode(string $code)
    {
        $this->code = $code;
    }

    public function getInfo()
    {
        return $this->info;
    }

    public function setInfo(string $info)
    {
        $this->info = $info;
    }
}
