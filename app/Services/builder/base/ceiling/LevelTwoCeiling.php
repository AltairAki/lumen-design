<?php

namespace App\Services\builder\base\ceiling;

use App\Services\builder\base\Matter;

/**
 * 吊顶
 * 品牌；装修公司自带
 * 型号：一级顶
 */
class LevelTwoCeiling implements Matter
{
    public function scene()
    {
        return "吊顶";
    }

    public function brand()
    {
        return "装修公司自带";
    }

    public function model()
    {
        return "二级顶";
    }

    public function price()
    {
        return 850;
    }

    public function desc()
    {
        return "两个层次的吊顶，二级吊顶高度一般就往下吊20cm，要是层高很高，也可增加每级的厚度";
    }
}
