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

Route::get('/', function () {
    return view('welcomes');
});

// Halaman Admin
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/bridge', function () {
        if (Auth::user()->perusahaan_id == NULL) return redirect('/admin/perusahaan');
        return redirect('/admin/dashboard');
    });

    // Perusahaan Route
    Route::resource('/admin/perusahaan', 'Admin\PerusahaanController');

    Route::get('/admin/logout', function () {
        Auth::logout();
    });

    Route::middleware(['checkPerusahaanIdForAll'])->group(function() {
        // Dashboard Route
        Route::resource('/admin/dashboard', 'Admin\DashboardController');
    });

});

Route::get('/app-admin', function () {
    return redirect('/login');
});
