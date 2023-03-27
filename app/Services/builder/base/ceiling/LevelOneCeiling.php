<?php

namespace App\Services\builder\base\ceiling;

use App\Services\builder\base\Matter;

/**
 * 吊顶
 * 品牌；装修公司自带
 * 型号：一级顶
 */
class LevelOneCeiling implements Matter
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
        return "一级顶";
    }

    public function price()
    {
        return 260;
    }

    public function desc()
    {
        return "造型只做低一级，只有一个层次的吊顶，一般离顶120-150mm";
    }
}
