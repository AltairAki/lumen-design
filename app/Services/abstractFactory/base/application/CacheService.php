<?php

namespace App\Services\abstractFactory\base\application;

interface CacheService
{
    public function get(string $key);

    public function set(string $key, string $value, int $timeout);

    public function del(string $key);
}
