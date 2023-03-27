<?php

namespace App\Http\Controllers;

use App\Services\observer\after\LotteryServiceImpl;

class ObserverController extends Controller
{
    public function after()
    {
        $lotteryService = new LotteryServiceImpl();
        $result = $lotteryService->draw("1000000101010019");
        dump($result);
    }
}
