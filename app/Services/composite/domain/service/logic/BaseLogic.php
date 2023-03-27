<?php

namespace App\Services\composite\domain\service\logic;

use App\Services\composite\domain\model\vo\TreeNodeLink;

abstract class BaseLogic implements LogicFilter
{
    public function filter(string $matterValue, $treeNodeLineInfoList)
    {
        foreach ($treeNodeLineInfoList as $nodeLine) {
            /**@var  TreeNodeLink $nodeLine */
            if ($this->decisionLogic($matterValue, $nodeLine)) return $nodeLine->getNodeIdTo();
        }
        return 0;
    }

    /**
     * 获取决策值
     *
     * @param array decisionMatter 决策物料
     * @return string 决策值
     */
    public abstract function matterValue(int $treeId, string $userId, array $decisionMatter): string;

    private function decisionLogic(string $matterValue, TreeNodeLink $nodeLink)
    {
        switch ($nodeLink->getRuleLimitType()) {
            case 1:
                return $matterValue == $nodeLink->getRuleLimitValue();
            case 2:
                return $matterValue > $nodeLink->getRuleLimitValue();
            case 3:
                return $matterValue < $nodeLink->getRuleLimitValue();
            case 4:
                return $matterValue <= $nodeLink->getRuleLimitValue();
            case 5:
                return $matterValue >= $nodeLink->getRuleLimitValue();
            default:
                return false;
        }
    }
}
