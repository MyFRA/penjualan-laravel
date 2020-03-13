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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');






// Halaman Admin
	Route::middleware(['auth'])->group(function() {
		// Dashboard Route
		Route::resource('/', 'Admin\DashboardController');
	});






    Route::get('/app-admin', function() {
        return redirect('/login');
    });
