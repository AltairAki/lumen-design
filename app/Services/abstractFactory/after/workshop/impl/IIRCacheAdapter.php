<?php

namespace App\Services\abstractFactory\after\workshop\impl;

use App\Services\abstractFactory\after\workshop\ICacheAdapter;
use App\Services\abstractFactory\base\redis\cluster\IIR;

class IIRCacheAdapter implements ICacheAdapter
{
    private $iir;

    public function __construct()
    {
        $this->iir = new IIR();
    }

    public function get(string $key)
    {
        return $this->iir->get($key);
    }

    public function set(string $key, string $value, int $timeout)
    {
        $this->iir->set($key, $value, $timeout);
    }

    public function del(string $key)
    {
        $this->iir->del($key);
    }
}
