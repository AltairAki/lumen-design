<?php

namespace App\Services\abstractFactory\base\application;

use App\Services\abstractFactory\base\redis\RedisUtils;

class CacheServiceImpl  implements CacheService {

    private $redisUtils;

    public function __construct()
    {
        $this->redisUtils = new RedisUtils();
    }

    public function get(string $key)
    {
        // TODO: Implement get() method.
    }

    public function set(string $key, string $value, int $timeout)
    {
        // TODO: Implement set() method.
    }

    public function del(string $key)
    {
        // TODO: Implement del() method.
    }

}
