<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get', 'post'], '/admin/login', 'AdminController@login')->name('admin.login');

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.','middleware' => ['auth']], function() {
	Route::get('logout', 'AdminController@logout')->name('logout');
	Route::get('settings', 'AdminController@settings')->name('settings');
	Route::post('check-password', 'AdminController@checkPassword')->name('check-password');
	Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
});

Route::get('/home', 'HomeController@index')->name('home');
