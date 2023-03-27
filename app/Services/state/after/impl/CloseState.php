<?php

namespace App\Services\state\after\impl;

use App\Services\state\after\Result;
use App\Services\state\after\State;


/**
 * 活动状态；活动关闭
 */
class CloseState extends State
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
        return new Result("0001", "活动关闭不可提审");
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
        return new Result("0001", "活动关闭不可审核通过");
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
        return new Result("0001", "活动关闭不可审核拒绝");
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
        return new Result("0001", "活动关闭不可撤销审核");
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
        return new Result("0001", "活动关闭不可重复关闭");
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
        return new Result("0000", "活动开启完成");
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
        return new Result("0001", "活动关闭不可变更活动中");
    }
}
