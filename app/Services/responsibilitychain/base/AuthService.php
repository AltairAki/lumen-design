<?php

namespace App\Services\responsibilitychain\base;

/**
 * 模拟审核服务
 * 1. auth          审核流程
 * 2. queryAuthInfo 查询审核信息(时间)
 */
class AuthService
{
    public static $authMap;

    public static function queryAuthInfo(string $uId, string $orderId)
    {
        // 注意这里初次验证失败获取不到对应值应该返回 null， 不然会报：对应 key 不存在的错误
        return static::$authMap["{$uId}{$orderId}"] ?? null;
    }

    public static function auth(string $uId, string $orderId)
    {
        static::$authMap["{$uId}{$orderId}"] = date("Y-m-d H:i:s");
    }
}
