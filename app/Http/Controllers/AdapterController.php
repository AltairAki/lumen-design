<?php

namespace App\Http\Controllers;

use App\Services\adapter\after\MQAdapter;
use App\Services\adapter\base\mq\CreateAccount;

/**
 * 适配器模式：
 * 营销场景中后端研发在接收各类 MQ 消息，进行行为逻辑判断和发奖奖品激励的时候，也可以做一些消息适配。
 * 比如，接收激活、认证、下单、贷款等消息的时候，它们的字段是不统一的，但对于营销玩法来说，他们都是一种行为而已。
 */
class AdapterController extends Controller
{
    public function after()
    {
        $parse = date("Y-m-d H:i:s");

        $create_account = new CreateAccount();
        $create_account->setNumber("100001");
        $create_account->setAddress("河北省.廊坊市.广阳区.大学里职业技术学院");
        $create_account->setAccountDate($parse);
        $create_account->setDesc("在校开户");

        /**
         * link 实际业务中可以配置到数据库中，之后读取到 Redis 缓存中，进行使用。这样后面新增的就在控制台进行配置即可。
         */
        $link01 = ['userId' => 'number', 'bizId' => 'number', 'bizTime' => 'accountDate', 'desc' => 'desc'];

        $rebateInfo01 = MQAdapter::filter($create_account, $link01);
        dump("mq.create_account(适配前)" . $create_account->toString());
        dump("mq.create_account(适配后)" . $rebateInfo01->toString());
    }


}
