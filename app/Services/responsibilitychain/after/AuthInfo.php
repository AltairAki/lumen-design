<?php

namespace App\Services\responsibilitychain\after;

class AuthInfo
{
    private $code;
    private $info = "";

    public function __construct(string $code, string  ...$infos)
    {
        $this->code = $code;
        foreach ($infos as $str) {
            $this->info .= $str;
        }
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

    public function toString()
    {
        return json_encode(get_object_vars($this), JSON_UNESCAPED_UNICODE);
    }
}
