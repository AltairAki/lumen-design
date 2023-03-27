<?php

namespace App\Services\abstractFactory\base\redis\cluster;

use Illuminate\Support\Facades\Cache;

/**
 * 模拟Redis缓存服务，EGM
 */
class EGM
{
    public function gain(string $key)
    {
        dump("EGM获取数据 key：" . $key);
        return Cache::get($key);
    }

    public function set(string $key, string $value, int $timeout = 0)
    {
        dump("EGM写入数据 key：{$key} val：{$value} timeout：{$timeout}");
        Cache::add($key, $value, $timeout);
    }

    public function del(string $key)
    {
        dump("EGM删除数据 key：{$key}");
        Cache::forget($key);
    }
}
