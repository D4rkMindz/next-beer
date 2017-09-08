<?php

use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

/**
 * Index
 */
$routes->add('/index_get', route('GET', '/', 'App\Controller\IndexController:index'));
$routes->get('/index_get')->addDefaults(['_auth' => false]);

/**
 * Error
 */
$routes->add('/error_get', route('GET', '/error-{errorcode}', 'App\Controller\ErrorController:index'));
$routes->get('/error_get')->setRequirements(['errorcode' => '\d+']);
$routes->get('/error_get')->addDefaults(['_auth' => false]);

/**
 * Language
 */
$routes->add('/language', route('GET', '/language', 'App\Controller\LanguageController:language'));
$routes->get('/language')->addDefaults(['_auth' => false]);

/**
 * Users
 */
$routes->add('/users_get', route('GET', '/users', 'App\Controller\Api\UserController:getUsers'));

$routes->add('/user_get_id', route('GET', '/users/{user_id}', 'App\Controller\Api\UserController:getUser'));
$routes->get('/user_get_id')->setRequirements(['user_id' => '\d+']);

$routes->add('/users_post', route('POST', '/users', 'App\Controller\Api\UserController:addUser'));

$routes->add('/users_update', route('UPDATE', '/users/{user_id}', 'App\Controller\Api\UserController:updateUser'));
$routes->get('/users_update')->setRequirements(['user_id' => '\d+']);

$routes->add('/users_delete', route('DELETE', '/users/{user_id}', 'App\Controller\Api\UserController:deleteUser'));
$routes->get('/users_delete')->setRequirements(['user_id' => '\d+']);

/**
 * Authorization
 */
$routes->add('/authorize_add',
    route(['GET', 'POST'], '/authorize', 'App\Controller\Api\AuthorizationController:getAuth'));
$routes->get('/authorize_add')->addDefaults(['_auth' => false]);

return $routes;
