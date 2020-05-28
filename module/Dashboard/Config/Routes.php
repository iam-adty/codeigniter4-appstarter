<?php namespace Dashboard\Config;

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->group('dashboard', [
    'namespace' => 'Dashboard\Controllers'
], function ($routes) {
    $routes->get('/', 'Dashboard::index');
});
