<?php

use App\Http\Controllers\PrintersController;
use App\Http\Controllers\UsersController;

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
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'Dashboard\DashboardController@index');
    Route::get('computer/createform', 'ComputersController@createForm');
    Route::get('/sector/createform', 'SectorsController@createForm');
    Route::get('/printer/createform', 'PrintersController@createForm');
    Route::get('/monitor/createform', 'MonitorsController@createForm');
    Route::resource('admin/user', 'UsersController');
    Route::resource('computer', 'ComputersController');
    Route::resource('sector', 'SectorsController');
    Route::resource('printer', 'PrintersController');
    Route::resource('monitor', 'MonitorsController');
    Route::post('admin/user/newEmail', 'UsersController@newEmail')->name('newEmail');
    Route::post('admin/user/newPassword', 'UsersController@newPassword')->name('newPassword');
});




Route::get('/', 'Site\SiteController@index');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('computer/index', 'ComputersController@index');
