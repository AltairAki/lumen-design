<?php

namespace App\Http\Controllers;

use App\Services\abstractFactory\after\factory\JDKProxyFactory;
use App\Services\abstractFactory\after\workshop\impl\EGMCacheAdapter;
use App\Services\abstractFactory\after\workshop\impl\IIRCacheAdapter;
use App\Services\abstractFactory\base\application\CacheService;
use App\Services\abstractFactory\before\CacheClusterServiceImpl;

/**
 * 抽象工厂：替换双集群升级，代理类抽象场景
 */
class AbstractFactory extends Controller
{
    public function before()
    {
        $cacheService = new CacheClusterServiceImpl();
        $cacheService->set("user_name_01", "airaki", 0, 1);

        $val01 = $cacheService->get('user_name_01', 1);
        dump("缓存集群升级，测试结果：{$val01}");
    }


    public function after()
    {
        $proxy_EGM = JDKProxyFactory::getProxy(CacheService::class, EGMCacheAdapter::class);
        $proxy_EGM->set("user_name_01", "airaki", 0);
        $val01 = $proxy_EGM->get("user_name_01");
        dump("缓存服务 EGM 测试，proxy_EGM.get 测试结果：{$val01}");


        $proxy_IIR = JDKProxyFactory::getProxy(CacheService::class, IIRCacheAdapter::class);
        $proxy_IIR->set("user_name_02", "airaki2", 0);
        $val02 = $proxy_IIR->get("user_name_02");
        dump("缓存服务 IIR 测试，proxy_IIR.get 测试结果：{$val02}");
    }
}
