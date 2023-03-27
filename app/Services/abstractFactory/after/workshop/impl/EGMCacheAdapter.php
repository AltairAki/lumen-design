<?php

namespace App\Services\abstractFactory\after\workshop\impl;

use App\Services\abstractFactory\after\workshop\ICacheAdapter;
use App\Services\abstractFactory\base\redis\cluster\EGM;

class EGMCacheAdapter implements ICacheAdapter
{
    private $egm;

    public function __construct()
    {
        $this->egm = new EGM();
    }

    public function get(string $key)
    {
        return $this->egm->gain($key);
    }

    public function set(string $key, string $value, int $timeout)
    {
        $this->egm->set($key, $value, $timeout);
    }

    public function del(string $key)
    {
        $this->egm->del($key);
    }
}
