<?php

namespace App\Services\composite\domain\model\vo;

/**
 * 规则树节点信息
 */
class TreeNode
{
    //规则树ID
    private $treeId;

    //规则树节点ID
    private $treeNodeId;

    //节点类型；1子叶、2果实
    private $nodeType;

    //节点值[nodeType=2]；果实值
    private $nodeValue;

    //规则Key
    private $ruleKey;

    //规则描述
    private $ruleDesc;

    //节点链路
    private $treeNodeLinkList;

    public function getTreeId()
    {
        return $this->treeId;
    }

    public function setTreeId(int $treeId)
    {
        $this->treeId = $treeId;
    }

    public function getTreeNodeId()
    {
        return $this->treeNodeId;
    }

    public function setTreeNodeId(int $treeNodeId)
    {
        $this->treeNodeId = $treeNodeId;
    }

    public function getNodeType()
    {
        return $this->nodeType;
    }

    public function setNodeType(int $nodeType)
    {
        $this->nodeType = $nodeType;
    }

    public function getNodeValue()
    {
        return $this->nodeValue;
    }

    public function setNodeValue($nodeValue)
    {
        $this->nodeValue = $nodeValue;
    }

    public function getRuleKey()
    {
        return $this->ruleKey;
    }

    public function setRuleKey($ruleKey)
    {
        $this->ruleKey = $ruleKey;
    }

    public function getRuleDesc()
    {
        return $this->ruleDesc;
    }

    public function setRuleDesc($ruleDesc)
    {
        $this->ruleDesc = $ruleDesc;
    }

    public function getTreeNodeLinkList()
    {
        return $this->treeNodeLinkList;
    }

    public function setTreeNodeLinkList($treeNodeLinkList)
    {
        $this->treeNodeLinkList = $treeNodeLinkList;
    }
}
