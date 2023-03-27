<?php

namespace App\Http\Controllers;

use App\Services\state\after\StateHandler;
use App\Services\state\base\ActivityService;
use App\Services\state\base\Status;
use Illuminate\Support\Str;

/**
 * 状态模式
 * 模拟运营活动审核状态变迁：编辑、提审、通过、拒绝、关闭、开启等
 */
class StateController extends Controller
{
    public function before()
    {
    }

    public function after()
    {
//        $this->test_Editing2Arraignment();
        $this->test_Editing2Open();
    }

    public function test_Editing2Arraignment()
    {
        $activityId = "100002";
        ActivityService::init($activityId, Status::EDITING);

        $stateHandler = new StateHandler();
        $result = $stateHandler->arraignment($activityId, Status::EDITING);
        dump("测试结果(编辑中To提审活动)：" . $result->toString());
        dump(sprintf("活动信息：%s ", ActivityService::queryActivityInfo($activityId)->toString()));
    }

    public function test_Editing2Open()
    {
        $activityId = "100002";
        ActivityService::init($activityId, Status::EDITING);
        $stateHandler = new StateHandler();
        $result = $stateHandler->open($activityId, Status::EDITING);
        dump("测试结果(编辑中To开启活动)：" . $result->toString());
        dump(sprintf("活动信息：%s ", ActivityService::queryActivityInfo($activityId)->toString()));
    }
}
