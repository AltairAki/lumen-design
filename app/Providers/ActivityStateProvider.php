<?php

namespace App\Providers;


use App\Services\state\after\impl\CheckState;
use App\Services\state\after\impl\CloseState;
use App\Services\state\after\impl\DoingState;
use App\Services\state\after\impl\EditingState;
use App\Services\state\after\impl\OpenState;
use App\Services\state\after\impl\PassState;
use App\Services\state\after\impl\RefuseState;
use App\Services\state\base\Status;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ActivityStateProvider extends ServiceProvider implements DeferrableProvider
{
    public function register()
    {
        // 待审核
        $this->app->bind('activity_state_' . Status::CHECK, function () {
            return new CheckState();
        });

        // 已关闭
        $this->app->bind('activity_state_' . Status::CLOSE, function () {
            return new CloseState();
        });

        // 活动中
        $this->app->bind('activity_state_' . Status::DOING, function () {
            return new DoingState();
        });

        // 编辑中
        $this->app->bind('activity_state_' . Status::EDITING, function () {
            return new EditingState();
        });

        // 已开启
        $this->app->bind('activity_state_' . Status::OPEN, function () {
            return new OpenState();
        });

        // 审核通过
        $this->app->bind('activity_state_' . Status::PASS, function () {
            return new PassState();
        });

        // 审核拒绝
        $this->app->bind('activity_state_' . Status::REFUSE, function () {
            return new RefuseState();
        });

    }
}
