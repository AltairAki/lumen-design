<?php

namespace App\Services\state\base;

use Illuminate\Support\Str;

class ActivityInfo
{
    // 活动ID
    private $activityId;

    // 活动名称
    private $activityName;

    // 活动状态
    private $status;

    // 开始时间
    private $beginTime;

    // 结束时间
    private $endTime;

    public function getActivityId()
    {
        return $this->activityId;
    }

    public function setActivityId(string $activityId)
    {
        $this->activityId = $activityId;
    }

    public function getActivityName()
    {
        return $this->activityName;
    }

    public function setActivityName(string $activityName)
    {
        $this->activityName = $activityName;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getBeginTime()
    {
        return $this->beginTime;
    }

    public function setBeginTime($beginTime)
    {
        $this->beginTime = $beginTime;
    }

    public function getEndTime()
    {
        return $this->endTime;
    }

    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    }

    public function toString()
    {
        return json_encode(get_object_vars($this), JSON_UNESCAPED_UNICODE);
    }
}
