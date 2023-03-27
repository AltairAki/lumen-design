<?php

namespace App\Services\composite\domain\model\vo;

/**
 * 树根信息
 */
class TreeRoot
{
    //规则树ID
    private $treeId;

    //规则树根ID
    private $treeRootNodeId;

    //规则树名称
    private $treeName;

    public function getTreeId()
    {
        return $this->treeId;
    }

    public function setTreeId(int $treeId)
    {
        $this->treeId = $treeId;
    }

    public function getTreeRootNodeId()
    {
        return $this->treeRootNodeId;
    }

    public function setTreeRootNodeId(int $treeRootNodeId)
    {
        $this->treeRootNodeId = $treeRootNodeId;
    }

    public function getTreeName()
    {
        return $this->treeName;
    }

    public function setTreeName(string $treeName)
    {
        $this->treeName = $treeName;
    }
}
