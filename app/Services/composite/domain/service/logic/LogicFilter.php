<?php

namespace App\Services\composite\domain\service\logic;

interface LogicFilter
{
    /**
     * 逻辑决策器
     *
     * @param string $matterValue 决策值
     * @param array $treeNodeLineInfoList 决策节点
     * @return int  下一个节点Id
     */
    function filter(string $matterValue, $treeNodeLineInfoList);

    /**
     * 获取决策值
     *
     * @param array decisionMatter 决策物料
     * @return string 决策值
     */
    function matterValue(int $treeId, string $userId, array $decisionMatter): string;
}
