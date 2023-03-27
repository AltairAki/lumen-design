<?php

namespace App\Services\state\after\impl;

use App\Services\state\after\Result;
use App\Services\state\after\State;


/**
 * 活动状态；审核拒绝
 */
class RefuseState extends State
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
        return new Result("0001", "已审核状态不可重复提审");
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
        return new Result("0001", "已审核状态不可重复审核");
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
        return new Result("0001", "活动审核拒绝不可重复审核");
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
        return new Result("0000", "撤销审核完成");
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
        return new Result("0001", "审核拒绝不可执行活动为进行中");
    }
}
