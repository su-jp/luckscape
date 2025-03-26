<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//$routes->get('/fortune/generate', 'FortuneGenerator::generate');
$routes->post('/fortune', 'FortuneController::showFortune');
$routes->get('/contact', 'Pages::contact');
$routes->get('/privacy-policy', 'Pages::privacyPolicy');
$routes->get('/terms', 'Pages::terms');


