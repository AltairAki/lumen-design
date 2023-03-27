<?php

namespace App\Services\factory\goods;

class GoodsService
{
    public function deliverGoods(DeliverReq $req)
    {
        dump("模拟发货实物商品一个：", $req);
        return true;
    }
}
