<?php

namespace App\Services\state\after;

class StateHandler
{
    private $stateMap = [];

    // 活动提审
    public function arraignment(string $activityId, $currentStatus): Result
    {
        return app('activity_state_' . $currentStatus)->arraignment($activityId, $currentStatus);
    }

    // 审核通过
    public function checkPass(string $activityId, $currentStatus): Result
    {
        return app('activity_state_' . $currentStatus)->checkPass($activityId, $currentStatus);
    }

    // 审核拒绝
    public function checkRefuse(string $activityId, $currentStatus): Result
    {
        return app('activity_state_' . $currentStatus)->checkRefuse($activityId, $currentStatus);
    }

    // 撤审撤销
    public function checkRevoke(string $activityId, $currentStatus): Result
    {
        return app('activity_state_' . $currentStatus)->checkRevoke($activityId, $currentStatus);
    }

    // 活动关闭
    public function close(string $activityId, $currentStatus): Result
    {
        return app('activity_state_' . $currentStatus)->close($activityId, $currentStatus);
    }

    // 活动开启
    public function open(string $activityId, $currentStatus): Result
    {
        return app('activity_state_' . $currentStatus)->open($activityId, $currentStatus);
    }

    // 活动执行
    public function doing(string $activityId, $currentStatus): Result
    {
        return app('activity_state_' . $currentStatus)->doing($activityId, $currentStatus);
    }


}
