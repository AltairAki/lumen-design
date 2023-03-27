<?php

namespace App\Services\abstractFactory\after\workshop;

use App\Services\abstractFactory\base\application\CacheService;

/**
 * 车间适配器
 */
interface ICacheAdapter
{
    public function get(string $key);

    public function set(string $key, string $value, int $timeout);

    public function del(string $key);

}

