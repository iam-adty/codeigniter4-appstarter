<?php namespace Dashboard\Config;

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->match([
    'get'
], 'logout', 'Logout::index', [
    'namespace' => 'Dashboard\Controllers'
]);

$routes->match([
    'get', 'post'
], 'login', 'Login::index', [
    'namespace' => 'Dashboard\Controllers',
    'filter' => 'xpanderAuth:web,outside'
]);

$routes->group('dashboard', [
    'namespace' => 'Dashboard\Controllers',
    'filter' => 'xpanderAuth:web,inside'
], function ($routes) {
    $routes->match([
        'get', 'post'
    ], '/', 'Dashboard::index');
});
