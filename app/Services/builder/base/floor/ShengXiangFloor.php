<?php

namespace App\Services\builder\base\floor;

use App\Services\builder\base\Matter;

/**
 * 地板
 * 品牌：圣象
 */
class ShengXiangFloor implements Matter
{
    public function scene()
    {
        return "地板";
    }

    public function brand()
    {
        return "圣象";
    }

    public function model()
    {
        return "一级";
    }

    public function price()
    {
        return floatval(318);
    }

    public function desc()
    {
        return "圣象地板是中国地板行业著名品牌。圣象地板拥有中国驰名商标、中国名牌、国家免检、中国环境标志认证等多项荣誉。";
    }
}
