<?php

namespace App\Services\builder\before;

use App\Services\builder\base\ceiling\LevelOneCeiling;
use App\Services\builder\base\ceiling\LevelTwoCeiling;
use App\Services\builder\base\coat\DuluxCoat;
use App\Services\builder\base\coat\LiBangCoat;
use App\Services\builder\base\floor\ShengXiangFloor;
use App\Services\builder\base\tile\DongPengTile;
use App\Services\builder\base\tile\MarcoPoloTile;

class DecorationPackage
{
    public function getMatterList(float $area, int $level)
    {
        $list = []; // 装修清单
        $price = 0.00; // 装修价格

        // 豪华欧式
        if (1 == $level) {
            $levelTwoCeiling = new LevelTwoCeiling(); // 吊顶，二级顶
            $duluxCoat = new DuluxCoat();                   // 涂料，多乐士
            $shengXiangFloor = new ShengXiangFloor(); // 地板，圣象

            $list[] = $levelTwoCeiling;
            $list[] = $duluxCoat;
            $list[] = $shengXiangFloor;

            $price = bcadd($price, bcmul(0.2, bcmul($area, $levelTwoCeiling->price(), 4), 4), 4);
            $price = bcadd($price, bcmul(1.4, bcmul($area, $duluxCoat->price(), 4), 4), 4);
            $price = bcadd($price, bcmul($area, $shengXiangFloor->price(), 4), 4);
        }

        // 轻奢田园
        if (2 == $level) {
            $levelTwoCeiling = new LevelTwoCeiling();   // 吊顶，二级顶
            $liBangCoat = new LiBangCoat();           // 涂料，立邦

            $marcoPoloTile = new MarcoPoloTile();       // 地砖，马可波罗

            $list[] = $levelTwoCeiling;
            $list[] = $liBangCoat;
            $list[] = $marcoPoloTile;
            $price = bcadd($price, bcmul(0.2, bcmul($area, $levelTwoCeiling->price(), 4), 4), 4);
            $price = bcadd($price, bcmul(1.4, bcmul($area, $liBangCoat->price(), 4), 4), 4);
            $price = bcadd($price, bcmul($area, $marcoPoloTile->price(), 4), 4);

        }

        // 现代简约
        if (3 == $level) {
            $levelOneCeiling = new LevelOneCeiling();   // 吊顶，一级顶
            $liBangCoat = new LiBangCoat();           // 涂料，立邦
            $dongPengTile = new DongPengTile();        // 地砖，东鹏

            $list[] = $levelOneCeiling;
            $list[] = $liBangCoat;
            $list[] = $dongPengTile;
            $price = bcadd($price, bcmul(0.2, bcmul($area, $levelOneCeiling->price(), 4), 4), 4);
            $price = bcadd($price, bcmul(1.4, bcmul($area, $liBangCoat->price(), 4), 4), 4);
            $price = bcadd($price, bcmul($area, $dongPengTile->price(), 4), 4);
        }

        $detail = <<< 'DEATIL'
-------------------------------------------------------
装修清单
DEATIL;
        $detail .= PHP_EOL . "套餐等级：$level";
        $detail .= PHP_EOL . "套餐价格: " . round($price, 2) . " 元";
        $detail .= PHP_EOL . "房屋面积：$area 平米";
        $detail .= PHP_EOL . "材料清单：" . PHP_EOL;
        foreach ($list as $matter) {
            $detail .= sprintf("%s：%s、%s、平米价格：%s 元。", $matter->scene(), $matter->brand(), $matter->model(), $matter->price()) . PHP_EOL;
        }
        dump($detail);
    }
}
