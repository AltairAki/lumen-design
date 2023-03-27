<?php

namespace App\Services\builder\after;

use App\Services\builder\base\Matter;

interface IMenu
{
    /**
     * 吊顶
     */
    function appendCeiling(Matter $matter): IMenu;

    /**
     * 涂料
     */
    function appendCoat(Matter $matter): IMenu;

    /**
     * 地板
     */
    function appendFloor(Matter $matter): IMenu;

    /**
     * 地砖
     */
    function appendTile(Matter $matter): IMenu;

    /**
     * 明细
     */
    function getDetail();
}
