<?php

namespace App\Services\composite\domain\service\engine\impl;

use App\Services\composite\domain\model\vo\EngineResult;
use App\Services\composite\domain\service\engine\EngineBase;

class TreeEngineHandle extends EngineBase
{
    public function process($treeId, $userId, $treeRich, $decisionMatter): EngineResult
    {
        // 决策流程
        $treeNode = $this->engineDecisionMaker($treeRich, $treeId, $userId, $decisionMatter);
        // 决策结果
        return new EngineResult($userId, $treeId, $treeNode->getTreeNodeId(), $treeNode->getNodeValue());
    }
}
