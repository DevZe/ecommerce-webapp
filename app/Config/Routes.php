<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// $routes->setDefaultNamespace('App\Controllers');
// $routes->setDefaultController('UsersController');




$routes->match(['get','post'],'/', 'UsersController::index',['filter'=>'noauth']);

$routes->get('shopping_cart','Admin\ShopController::cart',['filter'=>'auth']);
$routes->add('shopping_cart/update/(:any)/(:any)','Admin\ShopController::updateOrderItem/$1/$2',['filter'=>'auth']);
$routes->add('shopping_cart/delete/(:any)','Admin\ShopController::deleteCartItem/$1',['filter'=>'auth']);
$routes->add('checkout','Admin\ShopController::checkout',['filter'=>'auth']);
$routes->add('register','UsersController::createUser',['filter'=>'noauth']);
$routes->match(['get','post'],'auth/register','UsersController::register',['filter'=>'noauth']);


$routes->get('store','Admin\ShopController::store',['filter'=>'auth']);
$routes->match(['get','post'],'profile','UsersController::profile',['filter'=>'auth']);
$routes->get('logout','UsersController::logout');

$routes->group('admin',function ($routes){
    //Store Routes
    
    //Products Routes
    $routes->add('products','Admin\ShopController::getAllProducts');
    $routes->add('products/(:any)','Admin\ShopController::getProduct/$1');
    $routes->get('product/new','Admin\ShopController::createProduct');
    $routes->post('product/new','Admin\ShopController::saveProduct');
    $routes->get('products/delete/(:any)','Admin\ShopController::delete/$1');
    $routes->get('products/edit/(:any)','Admin\ShopController::edit/$1');
    $routes->post('products/edit/(:any)','Admin\ShopController::saveEdited/$1');
    $routes->add('products/category','Admin\ShopController::getProductsCategory/$1');

    //Sales Routes
    $routes->post('cart/new','Admin\ShopController::addToCart');
    $routes->add('sales','Admin\ShopController::getAllSales');
    $routes->get('sales/(:any)','Admin\ShopController::getSale/$1');

});
