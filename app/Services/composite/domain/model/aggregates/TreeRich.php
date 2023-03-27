<?php

namespace App\Services\composite\domain\model\aggregates;


use App\Services\composite\domain\model\vo\TreeRoot;

/**
 * 规则树聚合
 */
class TreeRich
{
    // 树根信息
    private $treeRoot;

    //树节点ID -> 子节点
    private $treeNodeMap = [];

    public function __construct($treeRoot, $treeNodeMap)
    {
        $this->treeRoot = $treeRoot;
        $this->treeNodeMap = $treeNodeMap;
    }

    public function getTreeRoot()
    {
        return $this->treeRoot;
    }

    public function setTreeRoot(TreeRoot $treeRoot)
    {
        $this->treeRoot = $treeRoot;
    }

    public function getTreeNodeMap(): array
    {
        return $this->treeNodeMap;
    }

    public function setTreeNodeMap($treeNodeMap)
    {
        $this->treeNodeMap = $treeNodeMap;
    }
}
