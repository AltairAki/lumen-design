<?php

namespace App\Services\abstractFactory\before;

interface CacheService
{
    public function get(string $key, int $redisType);

    public function set(string $key, string $value, int $timeout, int $redisType);

    public function del(string $key, int $redisType);

}
