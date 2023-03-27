<?php

namespace App\Services\state\base;

class Status
{
    // 1创建编辑、2待审核、3审核通过(任务扫描成活动中)、4审核拒绝(可以撤审到编辑状态)、5活动中、6活动关闭、7活动开启(任务扫描成活动中)
    const EDITING = 1;
    const  CHECK = 2;
    const PASS = 3;
    const REFUSE = 4;
    const DOING = 5;
    const CLOSE = 6;
    const OPEN = 7;
}
