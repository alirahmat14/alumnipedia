<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::login');

$routes->get('/user', 'User::index');
$routes->get('/user/profile', 'User::profile');

$routes->get('/user/jenjang', 'User::jenjang');
$routes->get('/user/jenjang/tambah', 'User::tambah_jenjang');
$routes->get('/user/jenjang/edit/(:any)', 'User::edit_jenjang/$1');
$routes->get('/user/jenjang/hapus/(:any)', 'User::hapus_jenjang/$1');
$routes->post('/user/jenjang/tambah', 'User::tambah_jenjang');
$routes->post('/user/jenjang/edit/(:any)', 'User::edit_jenjang/$1');

$routes->get('/user/pesan', 'User::pesan');
$routes->get('/user/pesan/kirim', 'User::kirim_pesan');
$routes->get('/user/pesan/detail/(:any)', 'User::detail_pesan/$1');
$routes->get('/user/pesan/hapus/(:any)', 'User::hapus_pesan_admin/$1');
$routes->post('/user/pesan/kirim', 'User::kirim_pesan');

$routes->get('/admin', 'Admin::index');
$routes->get('/admin/profile', 'Admin::profile');
$routes->post('/admin/profile', 'Admin::profile');

$routes->get('/admin/data-alumni', 'Admin::alumni');
$routes->get('/admin/alumni/tambah', 'Admin::tambah_alumni');
$routes->get('/admin/alumni/edit/(:any)', 'Admin::edit_alumni/$1');
$routes->get('/admin/alumni/hapus/(:any)', 'Admin::hapus_alumni/$1');
$routes->get('/admin/alumni/reset-password/(:any)', 'Admin::reset_pass_alumni/$1');

$routes->get('/admin/jenjang-alumni', 'Admin::jenjang');

$routes->get('/admin/pesan', 'Admin::pesan');
$routes->get('/admin/pesan-user/kirim', 'Admin::kirim_pesan');
$routes->get('/admin/pesan-user/hapus/(:any)', 'Admin::hapus_pesan_user/$1');
$routes->get('/admin/pesan-admin/detail/(:any)', 'Admin::detail_pesan/$1');
$routes->post('/admin/pesan-user/kirim', 'Admin::kirim_pesan');

$routes->get('/admin/info', 'Admin::info');
$routes->get('/admin/info/tambah', 'Admin::tambah_info');
$routes->get('/admin/info/edit/(:any)', 'Admin::edit_info/$1');
$routes->get('/admin/info/hapus/(:any)', 'Admin::hapus_info/$1');
$routes->post('/admin/info/tambah', 'Admin::tambah_info');
$routes->post('/admin/info/edit/(:any)', 'Admin::edit_info/$1');

$routes->post('/admin/alumni/tambah', 'Admin::tambah_alumni');
$routes->post('/admin/alumni/edit/(:any)', 'Admin::edit_alumni/$1');

$routes->post('/auth', 'Home::auth');
$routes->get('/search', 'Home::search');
$routes->get('/logout', 'Home::logout');

$routes->post('/update-profil', 'User::update');
$routes->post('/update-foto-profil', 'User::updateFoto');
$routes->post('/user/ubah-password', 'User::updatePassword');

$routes->get('/user/hapus-foto-profil', 'User::deleteFoto');

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
