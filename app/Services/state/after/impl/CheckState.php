<?php

namespace App\Services\state\after\impl;

use App\Services\state\after\Result;
use App\Services\state\after\State;

/**
 * 待审核
 */
class CheckState extends State
{
    /**
     * 活动提审
     *
     * @param string $activityId 活动ID
     * @param int $currentStatus 当前状态
     * @return Result 执行结果
     */
    public function arraignment(string $activityId, $currentStatus):Result
    {
        return new Result("0001", "待审核状态不可重复提审");
    }

    /**
     * 审核通过
     *
     * @param string $activityId 活动ID
     * @param int $currentStatus 当前状态
     * @return Result 执行结果
     */
    public function checkPass(string $activityId, $currentStatus):Result
    {
        return new Result("0000", "活动审核通过完成");
    }

    /**
     * 审核拒绝
     *
     * @param string $activityId 活动ID
     * @param int $currentStatus 当前状态
     * @return Result 执行结果
     */
    public function checkRefuse(string $activityId, $currentStatus):Result
    {
        return new Result("0000", "活动审核拒绝完成");
    }

    /**
     * 撤审撤销
     *
     * @param string $activityId 活动ID
     * @param int $currentStatus 当前状态
     * @return Result 执行结果
     */
    public function checkRevoke(string $activityId, $currentStatus):Result
    {
        return new Result("0000", "活动审核撤销回到编辑中");
    }

    /**
     * 活动关闭
     *
     * @param string $activityId 活动ID
     * @param int $currentStatus 当前状态
     * @return Result 执行结果
     */
    public function close(string $activityId, $currentStatus):Result
    {
        return new Result("0000", "活动审核关闭完成");
    }

    /**
     * 活动开启
     *
     * @param string $activityId 活动ID
     * @param int $currentStatus 当前状态
     * @return Result 执行结果
     */
    public function open(string $activityId, $currentStatus):Result
    {
        return new Result("0001", "非关闭活动不可开启");
    }

    /**
     * 活动执行
     *
     * @param string $activityId 活动ID
     * @param int $currentStatus 当前状态
     * @return Result 执行结果
     */
    public function doing(string $activityId, $currentStatus):Result
    {
        return new Result("0001", "待审核活动不可执行活动中变更");
    }
}
