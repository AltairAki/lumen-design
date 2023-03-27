<?php

namespace App\Services\composite\domain\model\vo;

/**
 * 决策结果
 */
class EngineResult
{
    private $isSuccess; //执行结果
    private $userId;   //用户ID
    private $treeId;     //规则树ID
    private $nodeId;   //果实节点ID
    private $nodeValue;//果实节点值

    public function __construct($userId, $treeId, $nodeId, $nodeValue)
    {
        $this->isSuccess = true;
        $this->userId = $userId;
        $this->treeId = $treeId;
        $this->nodeId = $nodeId;
        $this->nodeValue = $nodeValue;
    }

    public function isSuccess()
    {
        return $this->isSuccess;
    }

    public function setSuccess(bool $success)
    {
        $this->isSuccess = $success;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId(string $userId)
    {
        $this->userId = $userId;
    }

    public function getTreeId()
    {
        return $this->treeId;
    }

    public function setTreeId(int $treeId)
    {
        $this->treeId = $treeId;
    }

    public function getNodeId()
    {
        return $this->nodeId;
    }

    public function setNodeId(int $nodeId)
    {
        $this->nodeId = $nodeId;
    }

    public function getNodeValue()
    {
        return $this->nodeValue;
    }

    public function setNodeValue(string $nodeValue)
    {
        $this->nodeValue = $nodeValue;
    }
}
