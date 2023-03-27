<?php

namespace App\Services\builder\base\floor;

use App\Services\builder\base\Matter;

/**
 * 地板
 * 品牌；德尔(Der)
 */
class DerFloor implements Matter
{
    public function scene()
    {
        return "地板";
    }

    public function brand()
    {
        return "德尔(Der)";
    }

    public function model()
    {
        return "A+";
    }

    public function price()
    {
        return floatval(119);
    }

    public function desc()
    {
        return "DER德尔集团是全球领先的专业木地板制造商，北京2008年奥运会家装和公装地板供应商";
    }
}
