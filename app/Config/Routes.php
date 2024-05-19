<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->add('store','Home::store');
$routes->add('product/(:any)','Home::getProduct/$1');
$routes->add('register','Home::createUser');

$routes->group('admin',function ($routes){
    $routes->add('sales','Admin\SalesController::getSales');
    $routes->add('products','Admin\ShopController::getProducts');
    $routes->add('products/(:any)','Admin\ShopController::getProduct/$1');
    $routes->get('product/new','Admin\ShopController::createProduct');
    $routes->post('product/new','Admin\ShopController::saveProduct');
});
