<?php namespace Dashboard\Config;

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->match([
    'get', 'post'
], 'login', 'Login::index', [
    'namespace' => 'Dashboard\Controllers',
    'filter' => 'loginAuth'
]);

$routes->group('dashboard', [
    'namespace' => 'Dashboard\Controllers',
    'filter' => 'dashboardAuth'
], function ($routes) {
    $routes->match([
        'get', 'post'
    ], '/', 'Dashboard::index');
});
