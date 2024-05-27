<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->add('product/(:any)','Home::getProduct/$1');
$routes->add('register','Home::createUser');

$routes->group('admin',function ($routes){
    $routes->add('store','Admin\ShopController::store');
    $routes->add('sales','Admin\SalesController::getSales');
    $routes->add('products','Admin\ShopController::getAllProducts');
    $routes->add('products/(:any)','Admin\ShopController::getProduct/$1');
    $routes->get('product/new','Admin\ShopController::createProduct');
    $routes->post('product/new','Admin\ShopController::saveProduct');
    $routes->get('products/delete/(:any)','Admin\ShopController::delete/$1');
    $routes->get('products/edit/(:any)','Admin\ShopController::edit/$1');
    $routes->post('products/edit/(:any)','Admin\ShopController::saveEdited/$1');
    $routes->add('products/category','Admin\ShopController::getProductsCategory/$1');
});
