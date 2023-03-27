<?php

namespace App\Services\abstractFactory\base\redis\cluster;

use Illuminate\Support\Facades\Cache;

/**
 * 模拟Redis缓存服务，IIR
 */
class IIR
{
    public function get(string $key)
    {
        dump("IIR获取数据 key：" . $key);
        return Cache::get($key);
    }

    public function set(string $key, string $value, int $timeout = 0)
    {
        dump("IIR获取数据 key：{$key} val：{$value} timeout：{$timeout}");
        Cache::add($key, $value, $timeout);
    }

    public function del(string $key)
    {
        dump("IIR获取数据 key：{$key}");
        Cache::forget($key);
    }
}
