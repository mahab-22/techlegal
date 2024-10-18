<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/getGledgeMovableProperty', 'Home::getGledgeMovableProperty');
$routes->get('/updateDebtorGledgeMovableProperty', 'Home::updateDebtorGledgeMovableProperty');
