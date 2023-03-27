<?php

namespace App\Services\state\before;

use App\Services\state\base\ActivityService;
use App\Services\state\base\Status;

class ActivityExecStatus
{
    /**
     * 活动状态变更
     * 1. 编辑中 -> 提审、关闭
     * 2. 审核通过 -> 拒绝、关闭、活动中
     * 3. 审核拒绝 -> 撤审、关闭
     * 4. 活动中 -> 关闭
     * 5. 活动关闭 -> 开启
     * 6. 活动开启 -> 关闭
     */
    public function execStatus(string $activityId, $beforeStatus, $afterStatus): Result
    {
        // 1. 编辑中 -> 提审、关闭
        if (Status::EDITING == $beforeStatus) {
            if (Status::CHECK == $afterStatus || Status::CLOSE == $afterStatus) {
                ActivityService::execStatus($activityId, $beforeStatus, $afterStatus);
                return new Result("0000", "变更状态成功");
            } else {
                return new Result("0001", "变更状态拒绝");
            }
        }

        // 2. 审核通过 -> 拒绝、关闭、活动中
        if (Status::PASS == $beforeStatus) {
            if (Status::REFUSE == $afterStatus || Status::DOING == $afterStatus || Status::CLOSE == $afterStatus) {
                ActivityService:: execStatus($activityId, $beforeStatus, $afterStatus);
                return new Result("0000", "变更状态成功");
            } else {
                return new Result("0001", "变更状态拒绝");
            }
        }

        // 3. 审核拒绝 -> 撤审、关闭
        if (Status::REFUSE == $beforeStatus) {
            if (Status::EDITING == $afterStatus || Status::CLOSE == $afterStatus) {
                ActivityService:: execStatus($activityId, $beforeStatus, $afterStatus);
                return new Result("0000", "变更状态成功");
            } else {
                return new Result("0001", "变更状态拒绝");
            }
        }

        // 4. 活动中 -> 关闭
        if (Status::DOING == $beforeStatus) {
            if (Status::CLOSE == $afterStatus) {
                ActivityService:: execStatus($activityId, $beforeStatus, $afterStatus);
                return new Result("0000", "变更状态成功");
            } else {
                return new Result("0001", "变更状态拒绝");
            }
        }

        // 5. 活动关闭 -> 开启
        if (Status::CLOSE == $beforeStatus) {
            if (Status::OPEN == $afterStatus) {
                ActivityService:: execStatus($activityId, $beforeStatus, $afterStatus);
                return new Result("0000", "变更状态成功");
            } else {
                return new Result("0001", "变更状态拒绝");
            }
        }

        // 6. 活动开启 -> 关闭
        if (Status::OPEN == $beforeStatus) {
            if (Status::CLOSE == $afterStatus) {
                ActivityService:: execStatus($activityId, $beforeStatus, $afterStatus);
                return new Result("0000", "变更状态成功");
            } else {
                return new Result("0001", "变更状态拒绝");
            }
        }

        return new Result("0001", "非可处理的活动状态变更");
    }
}
