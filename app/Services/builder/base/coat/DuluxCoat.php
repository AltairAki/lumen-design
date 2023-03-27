<?php

namespace App\Services\builder\base\coat;

use App\Services\builder\base\Matter;

/**
 * 涂料
 * 品牌；多乐士(Dulux)
 */
class DuluxCoat implements Matter
{
    public function scene()
    {
        return "涂料";
    }

    public function brand()
    {
        return "多乐士(Dulux)";
    }

    public function model()
    {
        return "第二代";
    }

    public function price()
    {
        return 719;
    }

    public function desc()
    {
        return "多乐士是阿克苏诺贝尔旗下的著名建筑装饰油漆品牌，产品畅销于全球100个国家，每年全球有5000万户家庭使用多乐士油漆。";
    }
}
