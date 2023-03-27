<?php

namespace App\Services\state\base;

use Carbon\Carbon;

class ActivityService
{
    private static $statusMap;

    public static function init($activityId, $status)
    {
        // 模拟查询活动信息
        $activityInfo = new ActivityInfo();
        $activityInfo->setActivityId($activityId);
        $activityInfo->setActivityName("早起学习打卡领奖活动");
        $activityInfo->setStatus($status);
        $activityInfo->setBeginTime(new Carbon);
        $activityInfo->setEndTime(new Carbon);
        static::$statusMap[$activityId] = $status;
    }

    /**
     * 查询活动信息
     *
     * @param string $activityId 活动ID
     * @return ActivityInfo 查询结果
     */
    public static function queryActivityInfo(string $activityId): ActivityInfo
    {
        $activityInfo = new ActivityInfo();
        $activityInfo->setActivityId($activityId);
        $activityInfo->setActivityName("早起学习打卡领奖活动");
        $activityInfo->setStatus(static::$statusMap[$activityId]);
        $activityInfo->setBeginTime(new Carbon);
        $activityInfo->setEndTime(new Carbon);
        return $activityInfo;
    }

    /**
     * 查询活动状态
     */
    public static function queryActivityStatus(string $activityId)
    {
        if (!isset(static::$statusMap[$activityId])) {
            throw new \InvalidArgumentException("invalid activityId");
        }
        return static::$statusMap[$activityId];
    }


    public static function execStatus(string $activityId, $beforeStatus, $afterStatus)
    {
        if ($beforeStatus != static::$statusMap[$activityId]) return;
        // 这里只是演示，数据库可使用乐观锁（cas）更新
        static::$statusMap[$activityId] = $afterStatus;
    }
}
