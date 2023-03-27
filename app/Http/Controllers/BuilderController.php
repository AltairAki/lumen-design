<?php

namespace App\Http\Controllers;

use App\Services\builder\after\Builder;
use App\Services\builder\before\DecorationPackage;

/**
 * 建造者模式：指将一个复杂对象的构造与它的表示分离，使同样的构建过程可以创建不同的表示。它是将一个复杂的对象分解为多个简单的对象，然后一步一步构建而成。
 *
 * 工厂模式是用来创建不同但是相关类型的对象（继承同一父类或者接口的一组子类），由给定的参数来决定创建哪种类型的对象。
 * 建造者模式是用来创建一种类型的复杂对象，通过设置不同的可选参数，“定制化” 地创建不同的对象。网上有一个经典的例子很好地解释了两者的区别。
 */
class BuilderController extends Controller
{
    public function before()
    {
        $s = new DecorationPackage();
        $s->getMatterList(132.52, 1);
        $s->getMatterList(132.52, 2);
        $s->getMatterList(132.52, 3);
    }

    public function after()
    {
        $builder = new Builder();

        $builder->levelOne(132.52)->getDetail();
        $builder->levelTwo(132.52)->getDetail();
        $builder->levelThree(132.52)->getDetail();
    }
}
