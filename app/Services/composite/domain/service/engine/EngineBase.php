<?php

namespace App\Services\composite\domain\service\engine;

use App\Services\composite\domain\model\vo\EngineResult;
use App\Services\composite\domain\model\vo\TreeNode;

abstract class EngineBase extends EngineConfig implements IEngine
{
    public abstract function process($treeId, $userId, $treeRich, $decisionMatter): EngineResult;

    protected function engineDecisionMaker($treeRich, $treeId, $userId, $decisionMatter): TreeNode
    {
        $treeRoot = $treeRich->getTreeRoot();
        $treeNodeMap = $treeRich->getTreeNodeMap();

        // 规则树根ID
        $rootNodeId = $treeRoot->getTreeRootNodeId();
        $treeNodeInfo = $treeNodeMap[$rootNodeId];
        //节点类型[NodeType]；1子叶、2果实
        while ($treeNodeInfo->getNodeType() == 1) {
            $ruleKey = $treeNodeInfo->getRuleKey();
            $logicFilter = static::$logicFilterMap[$ruleKey];
            $matterValue = $logicFilter->matterValue($treeId, $userId, $decisionMatter);
            $nextNode = $logicFilter->filter($matterValue, $treeNodeInfo->getTreeNodeLinkList());
            if ($nextNode == 0) throw  new \InvalidArgumentException("invalid matterValue [$matterValue]");
            $treeNodeInfo = $treeNodeMap[$nextNode];
            dump(sprintf("决策树引擎=>%s userId：%s treeId：%s treeNode：%s ruleKey：%s matterValue：%s", $treeRoot->getTreeName(), $userId, $treeId, $treeNodeInfo->getTreeNodeId(), $ruleKey, $matterValue));
        }
        return $treeNodeInfo;
    }
}
