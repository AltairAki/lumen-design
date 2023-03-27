<?php

namespace App\Services\abstractFactory\before;

use App\Services\abstractFactory\base\redis\cluster\EGM;
use App\Services\abstractFactory\base\redis\cluster\IIR;
use App\Services\abstractFactory\base\redis\RedisUtils;

class CacheClusterServiceImpl implements CacheService
{

    private $redisUtils;
    private $egm;
    private $iir;

    public function __construct()
    {
        $this->redisUtils = new RedisUtils();
        $this->egm = new EGM();
        $this->iir = new IIR();
    }

    public function get(string $key, int $redisType)
    {
        if (1 == $redisType) {
            return $this->egm->gain($key);
        }

        if (2 == $redisType) {
            return $this->iir->get($key);
        }

        return $this->redisUtils->get($key);
    }

    public function set(string $key, string $value, int $timeout, int $redisType)
    {

        if (1 == $redisType) {
            $this->egm->set($key, $value, $timeout);
            return;

        }

        if (2 == $redisType) {
            $this->iir->set($key, $value, $timeout);
            return;
        }

        $this->redisUtils->set($key, $value, $timeout);
    }

    public function del(string $key, int $redisType)
    {

        if (1 == $redisType) {
            $this->egm->del($key);
            return;
        }

        if (2 == $redisType) {
            $this->iir->del($key);
            return;
        }

        $this->redisUtils->del($key);
    }
}
