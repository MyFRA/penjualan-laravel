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
Route::get('/invite/{token}', 'InviteController@index');
Route::get('/', function () {
    return view('landing');
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
        return redirect('login');
    });

    Route::middleware(['checkPerusahaanIdForAll'])->group(function() {
        // Dashboard Route
        Route::resource('/admin/dashboard', 'Admin\DashboardController')->only(['index']);

        // Anggota Route
        Route::resource('/admin/anggota', 'Admin\AnggotaController')->only(['index', 'show', 'update', 'destroy']);
        Route::put('/admin/anggota/{id}/{role}', 'Admin\AnggotaController@update');

        // Barang Route
        Route::resource('/admin/produk', 'Admin\BarangController');

        // Alamat Route
        Route::resource('/admin/alamat', 'Admin\AlamatController');

        // Profil Route
        Route::resource('/admin/profil', 'Admin\ProfilController');

        // Profil Perusahaan Route
        Route::resource('/admin/profil-perusahaan', 'Admin\ProfilPerusahaanController');

        // Penjualan Perusahaan Route
        Route::resource('/admin/penjualan', 'Admin\PenjualanController')->only(['index', 'show', 'destroy']);

        // Traffics Route
        Route::resource('/admin/traffics', 'Admin\TrafficsController')->except(['show']);

        // Keranjang Route
        Route::resource('/admin/keranjang', 'Admin\KeranjangController');
        Route::post('/admin/keranjang/add', 'Admin\KeranjangController@addStore');

        // Checkout Controller 
        Route::resource('/admin/checkout', 'Admin\CheckoutController');

        // Kas Controller
        Route::resource('/admin/kas', 'Admin\KasController');

        // Top Kontribusi Controller
        Route::resource('/admin/top-kontribusi', 'Admin\TopKontribusiController')->only(['index']);

    });

});

Route::get('/app-admin', function () {
    return redirect('/login');
});
