<?php

namespace App\Http\Controllers;

use App\Services\responsibilitychain\after\impl\Level1AuthLink;
use App\Services\responsibilitychain\after\impl\Level2AuthLink;
use App\Services\responsibilitychain\after\impl\Level3AuthLink;
use App\Services\responsibilitychain\base\AuthService;

/**
 * 责任链模式
 */
class ResponsibilityChainController extends Controller
{
    public function after()
    {
        $authLink = (new Level3AuthLink("1000013", "王工"))
            ->appendNext((new Level2AuthLink("1000012", "张经理"))
                ->appendNext(new Level1AuthLink("1000011", "段总")));
        $currentDate = "2020-06-18 23:49:46";

        // 验证失败
        dump("测试结果：" . $authLink->doAuth("airaki", "1000998004813441", $currentDate)->toString());


        /*模拟三级负责人审批*/
        AuthService::auth("1000013", "1000998004813441");
        dump("测试结果：模拟三级负责人审批，王工");
        dump("测试结果：" . $authLink->doAuth("airaki", "1000998004813441", $currentDate)->toString());


        /*模拟二级负责人审批*/
        AuthService::auth("1000012", "1000998004813441");
        dump("测试结果：模拟二级负责人审批，张经理");
        dump("测试结果：" . $authLink->doAuth("airaki", "1000998004813441", $currentDate)->toString());

        /*模拟一级负责人审批*/
        AuthService::auth("1000011", "1000998004813441");
        dump("测试结果：模拟一级负责人审批，段总");
        dump("测试结果：" . $authLink->doAuth("airaki", "1000998004813441", $currentDate)->toString());
    }
}
