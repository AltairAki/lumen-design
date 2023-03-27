<?php

namespace App\Services\responsibilitychain\after\impl;

use App\Services\responsibilitychain\after\AuthInfo;
use App\Services\responsibilitychain\after\AuthLink;
use App\Services\responsibilitychain\base\AuthService;

/**
 * 二级负责人
 */
class Level2AuthLink extends AuthLink
{

    private $beginDate;
    private $endDate;

    public function __construct(string $levelUserId, string $levelUserName)
    {
        parent::__construct($levelUserId, $levelUserName);
        $this->beginDate = "2020-06-01 00:00:00";
        $this->endDate = "2020-06-25 23:59:59";
    }

    public function doAuth(string $uId, string $orderId, $authDate): AuthInfo
    {
        // 模拟查询审核信息(时间)
        $date = AuthService::queryAuthInfo($this->levelUserId, $orderId);
        if (null == $date) {
            return new AuthInfo("0001", "单号：", $orderId, " 状态：待二级审批负责人 ", $this->levelUserName);
        }
        $next = parent::getNext();
        if (is_null($next)) {
            return new AuthInfo("0000", "单号：", $orderId, " 状态：二级审批完成负责人", " 时间：", $date, " 审批人：", $this->levelUserName);
        }
        if (strtotime($authDate) < strtotime($this->beginDate) || strtotime($authDate) > strtotime($this->endDate)) {
            return new AuthInfo("0000", "单号：", $orderId, " 状态：二级审批完成负责人", " 时间：", $date, " 审批人：", $this->levelUserName);
        }
        return $next->doAuth($uId, $orderId, $authDate);
    }
}
