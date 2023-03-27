<?php

namespace App\Services\builder\after;

use App\Services\builder\base\ceiling\LevelOneCeiling;
use App\Services\builder\base\ceiling\LevelTwoCeiling;
use App\Services\builder\base\coat\DuluxCoat;
use App\Services\builder\base\coat\LiBangCoat;
use App\Services\builder\base\floor\ShengXiangFloor;
use App\Services\builder\base\tile\DongPengTile;
use App\Services\builder\base\tile\MarcoPoloTile;

class Builder
{
    public function levelOne($area)
    {
        return (new DecorationPackageMenu($area, "豪华欧式"))
            ->appendCeiling(new LevelTwoCeiling())    // 吊顶，二级顶
            ->appendCoat(new DuluxCoat())             // 涂料，多乐士
            ->appendFloor(new ShengXiangFloor());     // 地板，圣象
    }

    public function levelTwo($area)
    {
        return (new DecorationPackageMenu($area, "轻奢田园"))
            ->appendCeiling(new LevelTwoCeiling())    // 吊顶，二级顶
            ->appendCoat(new LiBangCoat())             // 涂料，立邦
            ->appendFloor(new MarcoPoloTile());     // 地板，马可波罗
    }

    public function levelThree($area)
    {
        return (new DecorationPackageMenu($area, "现代简约"))
            ->appendCeiling(new LevelOneCeiling())    // 吊顶，一级顶
            ->appendCoat(new LiBangCoat())             // 涂料，立邦
            ->appendFloor(new DongPengTile());     // 地板，东鹏
    }
}
