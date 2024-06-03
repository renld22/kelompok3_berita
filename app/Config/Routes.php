<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/user', 'User::index');
$routes->get('/user/tambah', 'User::tambah');
$routes->post('/user/save', 'User::save');
$routes->get('/user/ubah/(:num)', 'User::edit/$1');
$routes->post('/user/update/(:num)', 'User::update/$1');
$routes->get('/user/hapus/(:num)', 'User::hapus/$1');
$routes->get('/artikel', 'Artikel::index');
$routes->get('/artikel/tambah', 'Artikel::tambah');
$routes->post('/artikel/save', 'Artikel::save');
$routes->get('/artikel/ubah/(:num)', 'Artikel::edit/$1');
$routes->post('/artikel/update/(:num)', 'Artikel::update/$1');
$routes->get('/artikel/hapus/(:num)', 'Artikel::hapus/$1');
