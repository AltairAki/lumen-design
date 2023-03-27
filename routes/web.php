<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

/*工厂方法模式

工厂方法模式：工厂模式又称工厂方法模式，是一种创建型设计模式，其在父类中提供一个创建对象的方法允许子类决灾实例化对象的类型。

当每个对象的创建逻辑都比较简单的时候，推荐使用简单工厂模式，将多个对象的创建逻辑放到一个工厂类中。
当每个对象的创建逻辑都比较复杂的时候，为了避免设计一个过于庞大的简单工厂类，我推荐使用工厂方法模式，将创建逻辑拆分得更细，每个对象的创建逻辑独立到各自的工厂类中。

工厂模式是解耦对象的创建和使用。
 */

$router->get('/factory/before','FactoryController@before');
$router->get('/factory/after','FactoryController@after');


/**
 * 抽象工厂 AbstractFactory
 */

$router->get('/abstractfactory/before','AbstractFactory@before');
$router->get('/abstractfactory/after','AbstractFactory@after');


/**
 * 组合模式
 * CompositeController
 */

$router->get('/composite/after','CompositeController@after');
/**
 * 建造者模式
 */

$router->get('/builder/before','BuilderController@before');
$router->get('/builder/after','BuilderController@after');


/**
 * 适配器模式
 */
$router->get('/adapter/before','AdapterController@before');
$router->get('/adapter/after','AdapterController@after');

/**
 * 责任链模式 ResponsibilityChainController
 */

$router->get('/chain/after','ResponsibilityChainController@after');



/**
 * 观察者模式
 */
$router->get('/observer/after','ObserverController@after');


/*策略模式

策略模式: 指定义了一系列算法，并将每个算法封装起来，使它们可以相互替换，且算法的变化不会影响使用算法的客户。

一提到 if-else 分支判断，有人就觉得它是烂代码。如果 if-else 分支判断不复杂、代码不多，这并没有任何问题，
毕竟 if-else 分支判断几乎是所有编程语言都会提供的语法，存在即有理由。遵循 KISS 原则，怎么简单怎么来，就是最好的设计。
非得用策略模式，搞出 n多类，反倒是一种过度设计。


一提到策略模式，有人就觉得，它的作用是避免 if-else 分支判断逻辑。实际上，这种认识是很片面的。
策略模式主要的作用还是解耦策略的定义、创建和使用，控制代码的复杂度，让每个部分都不至于过于复杂、代码量过多。除此之外，
对于复杂代码来说，策略模式还能让其满足开闭原则，添加新策略的时候，最小化、集中化代码改动，减少引入 bug 的风险。

实际上，设计原则和思想比设计模式更加普适和重要。
*/
$router->get('/strategy/mj','StrategyController@mj');
$router->get('/strategy/zj','StrategyController@zj');
$router->get('/strategy/nyg','StrategyController@nyg');
$router->get('/strategy/zk','StrategyController@zk');


/*桥接模式 ——  Bridge Design Pattern

桥接模式：也是一种结构型设计式，可将一个大类或一系列紧密相关的类拆分为抽象和实现两个独的层次结构，
从而能在开发时分别使用就像用遥控器控制各类家电设备，也包括，把支付渠道和支付模式链接起来，可以满足我们刷脸和指纹的方式进行支付。
*/
$router->get('/bridge/before','BridgeController@before');
$router->get('/bridge/pay','BridgeController@pay');




$router->get('/state/before','StateController@before');
$router->get('/state/after','StateController@after');
