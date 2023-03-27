<?php

namespace App\Services\builder\after;

use App\Services\builder\base\Matter;

class DecorationPackageMenu implements IMenu
{
    private $list = [];  // 装修清单
    private $price;      // 装修价格

    private $area;      // 面积
    private $level;     // 装修等级；豪华欧式、轻奢田园、现代简约

    public function __construct($area, $level)
    {
        $this->area = $area;
        $this->level = $level;
    }

    public function appendCeiling(Matter $matter): IMenu
    {
        $this->list[] = $matter;
        $this->price = bcadd($this->price, bcmul(0.2, bcmul($this->area, $matter->price(), 4), 4), 4);
        return $this;
    }

    public function appendCoat(Matter $matter): IMenu
    {
        $this->list[] = $matter;
        $this->price = bcadd($this->price, bcmul(1.4, bcmul($this->area, $matter->price(), 4), 4), 4);
        return $this;
    }

    public function appendFloor(Matter $matter): IMenu
    {
        $this->list[] = $matter;
        $this->price = bcadd($this->price, bcmul($this->area, $matter->price(), 4), 4);
        return $this;
    }

    public function appendTile(Matter $matter): IMenu
    {
        $this->list[] = $matter;
        $this->price = bcadd($this->price, bcmul($this->area, $matter->price(), 4), 4);
        return $this;
    }

    public function getDetail()
    {
        $detail = <<< 'DEATIL'
-------------------------------------------------------
装修清单
DEATIL;
        $detail .= PHP_EOL . "套餐等级：$this->level";
        $detail .= PHP_EOL . "套餐价格: " . round($this->price, 2) . " 元";
        $detail .= PHP_EOL . "房屋面积：$this->area 平米";
        $detail .= PHP_EOL . "材料清单：" . PHP_EOL;
        foreach ($this->list as $matter) {
            $detail .= sprintf("%s：%s、%s、平米价格：%s 元。", $matter->scene(), $matter->brand(), $matter->model(), $matter->price()) . PHP_EOL;
        }
        dump($detail);
    }


}
