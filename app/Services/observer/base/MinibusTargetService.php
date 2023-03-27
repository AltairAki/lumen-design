<?php

namespace App\Services\observer\base;


/**
 * 小客车指标调控服务
 */
class MinibusTargetService
{
    /**
     * 模拟摇号，但不是摇号算法
     *
     * @param string $uId 用户编号
     * @return string 结果
     */
    public function lottery(string $uId)
    {
        return abs(ezmlm_hash($uId)) % 2 == 0 ? "恭喜你，编码 {$uId} 在本次摇号中签" : "很遗憾，编码 {$uId} 在本次摇号未中签或摇号资格已过期";
    }
}
