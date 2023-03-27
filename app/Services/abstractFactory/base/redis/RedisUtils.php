<?php

namespace App\Services\abstractFactory\base\redis;

use Illuminate\Support\Facades\Cache;

/**
 * 模拟最开始使用的Redis服务，单机的。
 */
class RedisUtils
{
    public function get(string $key)
    {
        dump("Redis获取数据 key：" . $key);
        return Cache::get($key);
    }

    public function set(string $key, string $value, int $timeout = 0)
    {
        dump("Redis写入数据 key：{$key} val：{$value} timeout：{$timeout}");
        Cache::add($key, $value, $timeout);
    }

    public function del(string $key)
    {
        dump("Redis删除数据 key：{$key}");
        Cache::forget($key);
    }
}
