<?php

namespace App\Services\builder\base\tile;

use App\Services\builder\base\Matter;

/**
 * 地砖
 * 品牌：东鹏瓷砖
 */
class DongPengTile implements Matter
{
    public function scene()
    {
        return "地砖";
    }

    public function brand()
    {
        return "东鹏瓷砖";
    }

    public function model()
    {
        return "10001";
    }

    public function price()
    {
        return (102);
    }

    public function desc()
    {
        return "东鹏瓷砖以品质铸就品牌，科技推动品牌，口碑传播品牌为宗旨，2014年品牌价值132.35亿元，位列建陶行业榜首。";
    }
}
