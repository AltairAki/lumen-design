<?php

namespace App\Services\composite\domain\service\engine;

use App\Services\composite\domain\service\logic\impl\UserAgeFilter;
use App\Services\composite\domain\service\logic\impl\UserGenderFilter;

class EngineConfig
{
    static $logicFilterMap;


    public function __construct()
    {
        static::$logicFilterMap = [
            'userAge' => new UserAgeFilter(),
            'userGender' => new UserGenderFilter(),
        ];
    }

    public function getLogicFilterMap()
    {
        return static::$logicFilterMap;
    }

    public function setLogicFilterMap($logicFilterMap)
    {
        static::$logicFilterMap = $logicFilterMap;
    }
}
