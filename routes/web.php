<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\SetMenuController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA (PUBLIC)
|--------------------------------------------------------------------------
*/

// Halaman utama adalah login
Route::view('/', 'login')->name('login');

/*
|--------------------------------------------------------------------------
| AUTHENTICATION (PUBLIC)
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AdminAuthController::class, 'login'])->name('login');

Route::get('/daftar', function () {
    return view('daftarlogin');
})->name('daftar');

Route::post('/daftar', [AdminAuthController::class, 'register'])->name('register.proses');

Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| HALAMAN YANG MEMERLUKAN LOGIN (PROTECTED)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    
    // HALAMAN UTAMA NAVBAR
    Route::view('/dashboard', 'dashboard')->name('dashboard.page');
    Route::view('/fasilitas', 'fasilitas')->name('fasilitas');
    Route::view('/daftarmenu', 'daftarmenu')->name('daftarmenu');
    Route::view('/paket', 'paket')->name('paket');
    Route::view('/catering', 'catering')->name('catering');
    Route::view('/tentang', 'tentang')->name('tentang');
    Route::view('/transaksi', 'transaksi')->name('transaksi');
    
    // PAGE CONTROLLER
    Route::get('/Dashboard', [PageController::class, 'Dashboard'])->name('Dashboard');
    Route::get('/reservasi', [PageController::class, 'reservasi'])->name('reservasi');
    Route::post('/transaksi', [PageController::class, 'transaksi'])->name('transaksi');
    
    Route::view('/makanan', 'makanan')->name('makanan');
    Route::view('/sayuran', 'sayuran')->name('sayuran');
    Route::view('/minuman', 'minuman')->name('minuman');

    // SUB MENU PAKET
    Route::get('/setmenu', [SetMenuController::class, 'index'])->name('setmenu');
    Route::get('/prasmanan', [SetMenuController::class, 'prasmanan'])->name('prasmanan');
    Route::get('/nasikotak', [SetMenuController::class, 'nasikotak'])->name('nasikotak');
    
    // RESERVASI CONTROLLER
    Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');
    Route::get('/transaksi/{id}', [ReservasiController::class, 'showTransaksi'])->name('transaksi.show');
    
    // TRANSAKSI CONTROLLER
    Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
    
    // LAPORAN CONTROLLER
    Route::get('/Laporan', [LaporanController::class, 'index'])->name('Laporan');
    Route::put('/transaksi/{id}/status', [LaporanController::class, 'updateStatus'])->name('transaksi.update-status');
    Route::delete('/transaksi/{id}', [LaporanController::class, 'destroy'])->name('transaksi.destroy');
});