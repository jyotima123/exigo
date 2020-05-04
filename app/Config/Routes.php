<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Home::dashboard');
$routes->get('/company', 'Home::company');
$routes->post('/insert-company', 'Home::Addcompany');
$routes->post('/modalCompanyDetails', 'Home::EditCompany');
$routes->post('/ajaxUpdateCompany', 'Home::updateCompany');
$routes->get('/client-login/(:any)', 'Home::LoginAsClient/$1');


$routes->match(['get', 'post'], '/setup_marketing_campaign', 'User::marketingCampaign');
$routes->match(['get', 'post'], '/overhead_expenses', 'User::expenses');
$routes->match(['get', 'post'], '/initial_metrics', 'User::initialMetrics');
$routes->post('/modalExpenseDetails', 'User::EditExpense');
$routes->post('/ajaxUpdateExpense', 'User::updateExpense');
$routes->post('/modalResourceDetails', 'User::EditResource');
$routes->post('/ajaxUpdateResource', 'User::updateResource');
$routes->post('/setup-status', 'User::status');

$routes->match(['get', 'post'], '/track_leads', 'User::leadTracking');
$routes->post('/lead_track', 'User::ajaxleadTracking');
$routes->match(['get', 'post'], '/track_expenses', 'User::expenseTracking');
$routes->post('/expense_track', 'User::ajaxExpenseTracking');
$routes->match(['get', 'post'], '/user_list', 'User::userList');
$routes->post('/modalUserDetails', 'User::editUser');
$routes->post('/ajaxUpdateUser', 'User::updateUser');

$routes->post('/login', 'Home::Login');
$routes->post('/status', 'Home::status');
$routes->post('/delete', 'Home::delete');
$routes->match(['get', 'post'], '/change-password', 'Home::changePassword');
$routes->get('/log-out', 'Home::logOut');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
