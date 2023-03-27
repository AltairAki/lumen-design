<?php

namespace App\Services\state\after;

abstract class State
{
    /**
     * 活动提审
     *
     * @param string $activityId 活动ID
     * @param int $currentStatus 当前状态
     * @return Result 执行结果
     */
    public abstract function arraignment(string $activityId, $currentStatus): Result;

    /**
     * 审核通过
     *
     * @param string $activityId 活动ID
     * @param int $currentStatus 当前状态
     * @return Result 执行结果
     */
    public abstract function checkPass(string $activityId, $currentStatus): Result;

    /**
     * 审核拒绝
     *
     * @param string $activityId 活动ID
     * @param int $currentStatus 当前状态
     * @return Result 执行结果
     */
    public abstract function checkRefuse(string $activityId, $currentStatus): Result;

    /**
     * 撤审撤销
     *
     * @param string $activityId 活动ID
     * @param int $currentStatus 当前状态
     * @return Result 执行结果
     */
    public abstract function checkRevoke(string $activityId, $currentStatus): Result;

    /**
     * 活动关闭
     *
     * @param string $activityId 活动ID
     * @param int $currentStatus 当前状态
     * @return Result 执行结果
     */
    public abstract function close(string $activityId, $currentStatus): Result;

    /**
     * 活动开启
     *
     * @param string $activityId 活动ID
     * @param int $currentStatus 当前状态
     * @return Result 执行结果
     */
    public abstract function open(string $activityId, $currentStatus): Result;

    /**
     * 活动执行
     *
     * @param string $activityId 活动ID
     * @param int $currentStatus 当前状态
     * @return Result 执行结果
     */
    public abstract function doing(string $activityId, $currentStatus): Result;
}
