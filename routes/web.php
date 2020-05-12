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

Route::get('/', function () {
    return view('landing');
});

// Halaman Login Undangan
Route::get('/invite/{token}', 'InviteController@index');

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

        // Profil Route
        Route::resource('/admin/profil', 'Admin\ProfilController')->only(['index', 'edit', 'update']);

        // Profil Perusahaan Route
        Route::resource('/admin/profil-perusahaan', 'Admin\ProfilPerusahaanController')->only(['index', 'edit', 'update']);

        // Penjualan Perusahaan Route
        Route::resource('/admin/penjualan', 'Admin\PenjualanController')->only(['index', 'show', 'destroy']);

        // Traffics Route
        Route::resource('/admin/traffics', 'Admin\TrafficsController')->except(['show']);

        // Keranjang Route
        Route::resource('/admin/keranjang', 'Admin\KeranjangController')->only(['create', 'store', 'destroy']);
        Route::post('/admin/keranjang/add', 'Admin\KeranjangController@addStore');

        // Checkout Controller 
        Route::resource('/admin/checkout', 'Admin\CheckoutController')->only(['index', 'store']);

        // Kas Controller
        Route::resource('/admin/kas', 'Admin\KasController')->only(['index', 'store']);

        // Top Kontribusi Controller
        Route::resource('/admin/top-kontribusi', 'Admin\TopKontribusiController')->only(['index']);

        // Credit Controller
        Route::get('/admin/credit', 'Admin\CreditController@index');

        // List Perusahaan Controller
        Route::get('/admin/list-perusahaan', 'Admin\ListPerusahaanController@index');

        // Cek Ongkir Controller
        Route::get('/admin/cek-ongkir', 'Admin\CekOngkirController@index')->name('cek-ongkir');
        Route::post('/admin/cek-ongkir', 'Admin\CekOngkirController@cek');
    });

});

Route::get('/admin', function () {
    return redirect('/login');
});
