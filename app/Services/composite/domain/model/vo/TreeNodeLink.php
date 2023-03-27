<?php

namespace App\Services\composite\domain\model\vo;

/**
 * 规则树线信息
 */
class TreeNodeLink
{
    //节点From
    private $nodeIdFrom;

    //节点To
    private $nodeIdTo;

    //限定类型；1:=;2:>;3:<;4:>=;5<=;6:enum[枚举范围]
    private $ruleLimitType;

    //限定值
    private $ruleLimitValue;

    public function getNodeIdFrom()
    {
        return $this->nodeIdFrom;
    }

    public function setNodeIdFrom(int $nodeIdFrom)
    {
        $this->nodeIdFrom = $nodeIdFrom;
    }

    public function getNodeIdTo(): int
    {
        return $this->nodeIdTo;
    }

    public function setNodeIdTo(int $nodeIdTo)
    {
        $this->nodeIdTo = $nodeIdTo;
    }

    public function getRuleLimitType()
    {
        return $this->ruleLimitType;
    }

    public function setRuleLimitType(int $ruleLimitType)
    {
        $this->ruleLimitType = $ruleLimitType;
    }

    public function getRuleLimitValue()
    {
        return $this->ruleLimitValue;
    }

    public function setRuleLimitValue(string $ruleLimitValue)
    {
        $this->ruleLimitValue = $ruleLimitValue;
    }
}
