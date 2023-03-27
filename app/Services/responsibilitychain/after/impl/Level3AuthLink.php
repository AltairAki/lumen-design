<?php

namespace App\Services\responsibilitychain\after\impl;

use App\Services\responsibilitychain\after\AuthInfo;
use App\Services\responsibilitychain\after\AuthLink;
use App\Services\responsibilitychain\base\AuthService;

/**
 * 三级负责人
 */
class Level3AuthLink extends AuthLink
{
    public function __construct(string $levelUserId, string $levelUserName)
    {
        parent::__construct($levelUserId, $levelUserName);
    }

    public function doAuth(string $uId, string $orderId, $authDate): AuthInfo
    {
        // 模拟查询审核信息(时间)
        $date = AuthService::queryAuthInfo($this->levelUserId, $orderId);
        // 第一次返回 null
        if (null == $date) {
            return new AuthInfo("0001", "单号：", $orderId, " 状态：待三级审批负责人 ", $this->levelUserName);
        }
        // 找到 level2
        $next = parent::getNext();
        if (is_null($next)) {
            return new AuthInfo("0000", "单号：", $orderId, " 状态：一级审批完成负责人", " 时间：", $date, " 审批人：", $this->levelUserName);
        }
        return $next->doAuth($uId, $orderId, $authDate);
    }
}
