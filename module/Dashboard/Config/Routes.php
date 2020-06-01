<?php namespace Dashboard\Config;

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->match([
    'get', 'post'
], 'login', 'Login::index', [
    'namespace' => 'Dashboard\Controllers'
]);

$routes->group('dashboard', [
    'namespace' => 'Dashboard\Controllers'
], function ($routes) {
    $routes->match([
        'get', 'post'
    ], '/', 'Dashboard::index');
});
