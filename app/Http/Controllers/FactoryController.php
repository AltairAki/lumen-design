<?php

namespace App\Http\Controllers;

use App\Services\factory\method\StoreFactory;
use App\Services\factory\old\AwardReq;
use App\Services\factory\old\Prize;

/**
 * 工厂模式：物流通过商店（工厂）提供不同的商品：退换卡、实物商品、优惠券
 */
class FactoryController extends Controller
{
    public function before()
    {
        $prize = new Prize();
        // 模拟发放优惠券测试
        $req01 = new AwardReq();
        $req01->setuId("10001");
        $req01->setAwardType(1);
        $req01->setAwardNumber("EGM1023938910232121323432");
        $req01->setBizId("791098764902132");
        $awardRes01 = $prize->awardToUser($req01);
        dump("请求参数：" . json_encode($req01));
        dump("测试结果：" . json_encode($awardRes01));


        // 模拟方法实物商品
        $req02 = new AwardReq();
        $req02->setuId("10001");
        $req02->setAwardType(2);
        $req02->setAwardNumber("9820198721311");
        $req02->setBizId("1023000020112221113");
        $req02->setExtMap([
            'consigneeUserName' => '谢飞机',
            'consigneeUserPhone' => '15200292123',
            'consigneeUserAddress' => '吉林省.长春市.双阳区.XX街道.檀溪苑小区.#18-2109',
        ]);

        $awardRes02 = $prize->awardToUser($req02);
        dump("请求参数：" . json_encode($req02));
        dump("测试结果：" . json_encode($awardRes02));

        $req03 = new AwardReq();
        $req03->setuId("10001");
        $req03->setAwardType(3);
        $req03->setAwardNumber("AQY1xjkUodl8LO975GdfrYUio");

        $awardRes03 = $prize->awardToUser($req03);
        dump("请求参数：" . json_encode($req03));
        dump("测试结果：" . json_encode($awardRes03));
    }

//    public function testSingleton()
//    {
//        app('iQiYiCard')->grantToken("15690908989", '1023000020112221113');
//
//        app('coupon')->sendCoupon("10001", "AQY1xjkUodl8LO975GdfrYUio", '10001');
//
//        $deliverReq = new DeliverReq();
//        $deliverReq->setUserName("huahua");
//        $deliverReq->setUserPhone("15609098989");
//        $deliverReq->setSku("ss");
//
//        $deliverReq->setOrderId("1023000020112221113");
//
//        $deliverReq->setConsigneeUserName("谢飞机");
//        $deliverReq->setConsigneeUserPhone("15200292123");
//        $deliverReq->setConsigneeUserAddress("吉林省.长春市.双阳区.XX街道.檀溪苑小区.#18-2109");
//        app('goods')->deliverGoods($deliverReq);
//    }

    /**
     * 工厂方法ifelse判断交给调用方判断，也可以根据 map 去掉 ifelse 的逻辑
     * @param StoreFactory $storeFactory
     * @return void
     */
    public function after(StoreFactory $storeFactory)
    {
        // 1. 优惠券
        $commodityService_1 = $storeFactory->getCommodityService(1);
        $commodityService_1->sendCommodity("10001", "EGM1023938910232121323432", "791098764902132", []);

        // 2. 实物商品
        $commodityService_2 = $storeFactory->getCommodityService(2);
        $commodityService_2->sendCommodity("10001", "9820198721311", "1023000020112221113", [
            'consigneeUserName' => '谢飞机',
            'consigneeUserPhone' => '15200292123',
            'consigneeUserAddress' => '吉林省.长春市.双阳区.XX街道.檀溪苑小区.#18-2109',
        ]);

        // 3. 第三方兑换卡(模拟爱奇艺)
        $commodityService_3 = $storeFactory->getCommodityService(3);
        $commodityService_3->sendCommodity("10001", "AQY1xjkUodl8LO975GdfrYUio", '9820198721311', []);
    }


    /**
     * $classMap = [
     * 'ali' => "app\common\lib\sms\AliSms",
     * 'yunpian' => "app\common\lib\sms\yunpianSms",
     * ];
     */
    public function factoryByReflect($type, $classMap, $params = [])
    {
        if (!array_key_exists($type, $classMap)) {
            return false;
        }
        $className = $classMap[$type];
        if (!class_exists($className)) {
            return false;
        }
        return (new \ReflectionClass($className))->newInstanceArgs($params);
    }
}
