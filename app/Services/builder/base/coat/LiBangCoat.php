<?php

namespace App\Services\builder\base\coat;

use App\Services\builder\base\Matter;

/**
 * 涂料
 * 品牌；立邦
 */
class LiBangCoat implements Matter
{
    public function scene()
    {
        return "涂料";
    }

    public function brand()
    {
        return "立邦";
    }

    public function model()
    {
        return "默认级别";
    }

    public function price()
    {
        return 650;
    }

    public function desc()
    {
        return "立邦始终以开发绿色产品、注重高科技、高品质为目标，以技术力量不断推进科研和开发，满足消费者需求。";
    }
}
