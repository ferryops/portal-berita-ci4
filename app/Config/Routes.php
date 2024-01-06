<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('news', 'NewsController::index');
$routes->get('news/export-pdf/(:num)', 'NewsController::exportToPdf/$1');
$routes->get('news/export-excel', 'NewsController::export');
$routes->get('news/(:any)', 'NewsController::detail/$1');
$routes->get('table', 'TableController::index');
$routes->get('table/exportToExcel', 'TableController::exportToExcel');
$routes->get('report', 'ReportController::index');
