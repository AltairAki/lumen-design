<?php

namespace App\Services\abstractFactory\after\factory;

use ReflectionClass;

class JDKProxyFactory
{

    private static $proxy;


    public static function getProxy($cacheClazz, $cacheAdapter)
    {
        return new $cacheAdapter;

//        $ref = new ReflectionClass($proxy);
//
//        if (!$ref->implementsInterface($cacheClazz)) {//是否实现了某个接口
//            dd('未实现了某个接口');
//        }
//        return $proxy;
    }


//    public function __call($name, $arguments)
//    {
//        $ref = new ReflectionClass(static::$proxy);
//        if ($ref->hasMethod($name)) {
//            $method = $ref->getMethod($name);
//            if ($method->isPublic() && !$method->isAbstract()) {
//                if ($method->isStatic()) {
//                    $method->invoke(null);
//                } else {
//                    $method->invoke(static::$proxy, ...$arguments);
//                }
//            }
//        }
//    }

}
