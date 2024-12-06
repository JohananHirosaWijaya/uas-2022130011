<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PemainController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\ManajerController;
use App\Http\Controllers\LigaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route untuk halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Route untuk autentikasi
Auth::routes();

// Route untuk halaman home setelah login
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

// Route untuk mengelola Liga
Route::prefix('liga')->name('liga.')->group(function () {
    Route::get('/', [LigaController::class, 'index'])->name('index'); // Menampilkan daftar liga
    Route::get('/create', [LigaController::class, 'create'])->name('create'); // Form untuk menambahkan liga baru
    Route::post('/store', [LigaController::class, 'store'])->name('store'); // Menyimpan liga baru
    Route::get('/{id}', [LigaController::class, 'show'])->name('show'); // Menampilkan detail liga
    Route::get('/{id}/edit', [LigaController::class, 'edit'])->name('edit'); // Form untuk mengedit liga
    Route::put('/{id}', [LigaController::class, 'update'])->name('update'); // Mengupdate liga
    Route::delete('/{id}', [LigaController::class, 'destroy'])->name('destroy'); // Menghapus liga
});

// Route untuk mengelola Manajer
Route::prefix('manajer')->name('manajer.')->group(function () {
    Route::get('/', [ManajerController::class, 'index'])->name('index'); // Menampilkan daftar manajer
    Route::get('/create', [ManajerController::class, 'create'])->name('create'); // Form untuk menambahkan manajer baru
    Route::post('/store', [ManajerController::class, 'store'])->name('store'); // Menyimpan manajer baru
    Route::get('/{id}', [ManajerController::class, 'show'])->name('show'); // Menampilkan detail manajer
    Route::get('/{id}/edit', [ManajerController::class, 'edit'])->name('edit'); // Form untuk mengedit manajer
    Route::put('/{id}', [ManajerController::class, 'update'])->name('update'); // Mengupdate manajer
    Route::delete('/{id}', [ManajerController::class, 'destroy'])->name('destroy'); // Menghapus manajer
});

// Route untuk mengelola Pemain
Route::prefix('pemain')->name('pemain.')->group(function () {
    Route::get('/', [PemainController::class, 'index'])->name('index'); // Menampilkan daftar pemain
    Route::get('/create', [PemainController::class, 'create'])->name('create'); // Form untuk menambahkan pemain baru
    Route::post('/store', [PemainController::class, 'store'])->name('store'); // Menyimpan pemain baru
    Route::get('/{id}', [PemainController::class, 'show'])->name('show'); // Menampilkan detail pemain
    Route::get('/{id}/edit', [PemainController::class, 'edit'])->name('edit'); // Form untuk mengedit pemain
    Route::put('/{id}', [PemainController::class, 'update'])->name('update'); // Mengupdate pemain
    Route::delete('/{id}', [PemainController::class, 'destroy'])->name('destroy'); // Menghapus pemain
});

// Route untuk mengelola Tim
Route::prefix('tim')->name('tim.')->group(function () {
    Route::get('/', [TimController::class, 'index'])->name('index'); // Menampilkan daftar tim
    Route::get('/create', [TimController::class, 'create'])->name('create'); // Form untuk menambahkan tim baru
    Route::post('/store', [TimController::class, 'store'])->name('store'); // Menyimpan tim baru
    Route::get('/{id}', [TimController::class, 'show'])->name('show'); // Menampilkan detail tim
    Route::get('/{id}/edit', [TimController::class, 'edit'])->name('edit'); // Form untuk mengedit tim
    Route::put('/{id}', [TimController::class, 'update'])->name('update'); // Mengupdate tim
    Route::delete('/{id}', [TimController::class, 'destroy'])->name('destroy'); // Menghapus tim
});

// Route untuk mengelola Transaksi Transfer
Route::prefix('transfer')->name('transfer.')->group(function () {
    Route::get('/', [TransferController::class, 'index'])->name('index'); // Menampilkan daftar transaksi transfer
    Route::get('/create', [TransferController::class, 'create'])->name('create'); // Form untuk menambahkan transaksi transfer baru
    Route::post('/store', [TransferController::class, 'store'])->name('store'); // Menyimpan transaksi transfer baru
    Route::get('/{id}', [TransferController::class, 'show'])->name('show'); // Menampilkan detail transaksi transfer
    Route::get('/{id}/edit', [TransferController::class, 'edit'])->name('edit'); // Form untuk mengedit transaksi transfer
    Route::put('/{id}', [TransferController::class, 'update'])->name('update'); // Mengupdate transaksi transfer
    Route::delete('/{id}', [TransferController::class, 'destroy'])->name('destroy'); // Menghapus transaksi transfer
});

// Route untuk mengelola Transaksi Pinjam
Route::prefix('pinjam')->name('pinjam.')->group(function () {
    Route::get('/', [PinjamController::class, 'index'])->name('index'); // Menampilkan daftar transaksi pinjam
    Route::get('/create', [PinjamController::class, 'create'])->name('create'); // Form untuk menambahkan transaksi pinjam baru
    Route::post('/store', [PinjamController::class, 'store'])->name('store'); // Menyimpan transaksi pinjam baru
    Route::get('/{id}', [PinjamController::class, 'show'])->name('show'); // Menampilkan detail transaksi pinjam
    Route::get('/{id}/edit', [PinjamController::class, 'edit'])->name('edit'); // Form untuk mengedit transaksi pinjam
    Route::put('/{id}', [PinjamController::class, 'update'])->name('update'); // Mengupdate transaksi pinjam
    Route::delete('/{id}', [PinjamController::class, 'destroy'])->name('destroy'); // Menghapus transaksi pinjam
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
