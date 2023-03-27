<?php

namespace App\Services\builder\base;

/**
 * 装修物料
 */
interface Matter
{
    /**
     * 场景；地板、地砖、涂料、吊顶
     */
    function scene();

    /**
     * 品牌
     */
    function brand();

    /**
     * 型号
     */
    function model();

    /**
     * 平米报价
     */
    function price();

    /**
     * 描述
     */
    function desc();
}
