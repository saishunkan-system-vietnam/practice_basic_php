<?php

/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

/*
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 */

/** @var \Cake\Routing\RouteBuilder $routes */
$routes->setRouteClass(DashedRoute::class);

$routes->scope('/', function (RouteBuilder $builder) {
    /*
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, templates/Pages/home.php)...
     */
    $builder->connect('/', ['controller' => 'Home', 'action' => 'home']);

    $builder->connect('/home', ['controller' => 'Home', 'action' => 'home']);

    $builder->connect('/chitiet/*', ['controller' => 'Detail', 'action' => 'detailProduct']);

    // *******Hiển thị sản phẩm *********
    $builder->connect('/danhmuc/*', ['controller' => 'View', 'action' => 'viewList']);
    $builder->connect('/timkiem/*', ['controller' => 'View', 'action' => 'searchProduct']);

    // lịch sử mua hàng
    $builder->connect('/lichsumuahang/*', ['controller' => 'View', 'action' => 'getOrderHistory']);

    // Chi tiết lịch sử mua hàng
    $builder->connect('/chitietdonhang/*', ['controller' => 'View', 'action' => 'viewContOrder']);

    // giỏ hàng
    $builder->connect('/giohang', ['controller' => 'Cart', 'action' => 'view']);
    $builder->connect('/delgiohang/*', ['controller' => 'Cart', 'action' => 'delete']);
    $builder->connect('/updgiohang', ['controller' => 'Cart', 'action' => 'update']);
    $builder->connect('/cleargiohang', ['controller' => 'Cart', 'action' => 'clear']);
    $builder->connect('/confirm-buy', ['controller' => 'Cart', 'action' => 'acceptBuyNonLogin']);

    $builder->connect('/login', ['controller' => 'User', 'action' => 'login']);
    $builder->connect('/dangky', ['controller' => 'User', 'action' => 'register']);
    $builder->connect('/logout', ['controller' => 'User', 'action' => 'logout']);


    Router::prefix('Admin', function (RouteBuilder $routes) {
        // Profile
        $routes->connect('/', ['controller' => 'Dashboard', 'action' => 'top']);

        // sản phẩm
        $routes->connect('/sanpham/*', ['controller' => 'Product', 'action' => 'viewPorduct']);
        $routes->connect('/addsanpham', ['controller' => 'Product', 'action' => 'addPorduct']);
        $routes->connect('/editsanpham/*', ['controller' => 'Product', 'action' => 'editPorduct']);
        $routes->connect('/delsanpham/*', ['controller' => 'Product', 'action' => 'deletePorduct']);


        // Image
        $routes->connect('/xoahinhanh/*', ['controller' => 'Image', 'action' => 'deleteImg']);
        $routes->connect('/settop/*', ['controller' => 'Image', 'action' => 'setTopImg']);
        $routes->connect('/image/*', ['controller' => 'Image', 'action' => 'editImg']);

        // Đơn hàng
        $routes->connect('/order/*', ['controller' => 'Order', 'action' => 'viewOrder']);
        $routes->connect('/proc/*', ['controller' => 'Order', 'action' => 'processOdr']);
        $routes->connect('/content-order/*', ['controller' => 'Order', 'action' => 'viewContOrder']);

        $routes->fallbacks(DashedRoute::class);
    });
    $builder->fallbacks();
});
