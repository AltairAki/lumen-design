<?php

namespace App\Services\adapter\after;

use Illuminate\Support\Str;

class MQAdapter
{
//    public static function filter(string $strJson, $link)  {
//        return filter(JSON.parseObject(strJson, Map.class), link);
//    }

    public static function filter($obj, $link)
    {
        $rebateInfo = new RebateInfo();
        foreach ($link as $key => $value) {
            $method = "set" . Str::ucfirst($key);
            $objMethod = "get" . Str::ucfirst($value);
            $rebateInfo->$method($obj->$objMethod());
        }
        return $rebateInfo;
    }
}
