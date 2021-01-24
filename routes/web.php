<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// APP
$base = '/';
Route::get('/', 'DashboardController@index')->name('dashboard');

$ns = 'ClientsController';
Route::get($base.'clients/trash', $ns.'@trash')->name('clients.trash');

$ns = 'EnterprisesController';
Route::get($base.'enterprises/trash', $ns.'@trash')->name('enterprises.trash');
Route::get($base.'enterprises/search', $ns.'@search')->name('enterprises.search');

$ns = 'UnitsController';
Route::get($base.'units/trash', $ns.'@trash')->name('units.trash');
Route::get($base.'units/{id}/value', $ns.'@getSaleValue')->name('units.value');

$ns = 'SalesController';
Route::get($base.'sales/trash', $ns.'@trash')->name('sales.trash');

$ns = 'SalesmanController';
Route::get($base.'salesman/trash', $ns.'@trash')->name('salesman.trash');

$ns = 'TechnicalManagersController';
Route::get($base.'technical_managers/trash', $ns.'@trash')->name('technical_managers.trash');
Route::get($base.'technical_managers/search', $ns.'@search')->name('technical_managers.search');

$ns = 'ReportsController';
Route::get($base.'reports/sales', $ns.'@sales')->name('reports.sales');
Route::get($base.'reports/units', $ns.'@units')->name('reports.units');

Route::resource($base.'clients', 'ClientsController');
Route::resource($base.'enterprises', 'EnterprisesController');
Route::resource($base.'units', 'UnitsController');
Route::resource($base.'sales', 'SalesController');
Route::resource($base.'salesman', 'SalesmanController');
Route::resource($base.'technical_managers','TechnicalManagersController');
Route::resource($base.'reports','ReportsController');