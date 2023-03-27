<?php

namespace App\Services\builder\base\tile;

use App\Services\builder\base\Matter;

/**
 * 地砖
 * 品牌；马可波罗(MARCO POLO)
 */
class MarcoPoloTile implements Matter
{

    public function scene()
    {
        return "地砖";
    }

    public function brand()
    {
        return "马可波罗(MARCO POLO)";
    }

    public function model()
    {
        return "缺省";
    }

    public function price()
    {
        return (140);
    }

    public function desc()
    {
        return "“马可波罗”品牌诞生于1996年，作为国内最早品牌化的建陶品牌，以“文化陶瓷”占领市场，享有“仿古砖至尊”的美誉。";
    }

}
