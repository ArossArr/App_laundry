<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/a', 'Home::index');
// $routes->get('/pelanggan','Pelanggan::tampil');
// $routes->get('/c', 'Home::uji');

// Controller login
$routes->get('/','Login::index');
$routes->add('plogin','Login::login');
$routes->get('/logout','Login::logout');
// Controller Home
$routes->get('/home','Home::index');

// controller pelanggan
$routes->get('/pelanggan','Pelanggan::tampil',['filter'=>'auth']);
$routes->get('/form','Pelanggan::form',['filter'=>'auth']);
$routes->add('/spelanggan','Pelanggan::save',['filter'=>'auth']);
$routes->get('/pelanggan/delete/(:segment)','Pelanggan::delete/$1');
$routes->add('/pelanggan/edit/(:segment)','Pelanggan::edit/$1');
// controller paket
$routes->get('/paket','Paket::tampil',['filter'=>'auth']);
$routes->add('/spaket','Paket::save',['filter'=>'auth']);
$routes->get('/fpaket','Paket::form',['filter'=>'auth']);
$routes->add('/paket/edit/(:segment)','Paket::edit/$1');
$routes->get('/paket/delete/(:segment)','Paket::delete/$1');
// controller petugas/user
$routes->get('/user','User::tampil',['filter'=>'auth']);
$routes->get('/fuser','User::form',['filter'=>'auth']);
$routes->add('/suser','User::save',['filter'=>'auth']);
$routes->add('/user/edit/(:segment)','User::edit/$1',['filter'=>'auth']);
$routes->get('/user/delete/(:segment)','User::delete/$1',['filter'=>'auth']);
// Routes Transaksi
$routes->get('/transaksi','Transaksi::tampil',['filter'=>'auth']);
$routes->add('/addcart','Transaksi::addcart',['filter'=>'auth']);
$routes->get('/transaksi/hapus/(:segment)','Transaksi::hapusCart/$1');
$routes->get('/transaksi/detail/(:segment)','Transaksi::detail/$1');
$routes->add('/stransaksi','Transaksi::simpan',['filter'=>'auth']);
// Routes Laporan
$routes->get('/laporan','Transaksi::laporan',['filter'=>'auth']);
$routes->get('/laporan/ambil/(:segment)','Transaksi::ambil/$1');
$routes->get('/laporan/delete/(:segment)','Transaksi::delete/$1');
$routes->add('/laporan/filter','Transaksi::filter',['filter'=>'auth']);
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
