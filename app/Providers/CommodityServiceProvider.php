<?php

namespace App\Providers;


use App\Services\factory\card\IQiYiCardService;
use App\Services\factory\coupon\CouponService;
use App\Services\factory\goods\GoodsService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class CommodityServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register()
    {
        // 往服务容器中注入一个名为 IQiYiCard 的单例对象
        $this->app->singleton('iQiYiCard', function () {
            return new IQiYiCardService();
        });


        // 往服务容器中注入一个名为 coupon 的单例对象
        $this->app->singleton('coupon', function () {
            return new CouponService();
        });

        // 往服务容器中注入一个名为 goods 的单例对象
        $this->app->singleton('goods', function () {
            return new GoodsService();
        });
    }
}
