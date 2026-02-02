<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\StokBahanController;
use App\Http\Controllers\MenuController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/stok-bahan', [StokBahanController::class, 'index'])->name('bahan');
Route::get('/stok', [StokBahanController::class, 'stok_bahan'])->name('stok');
Route::get('/supplier', [StokBahanController::class, 'supplier'])->name('supplier');
Route::get('/history-stok', [StokBahanController::class, 'history'])->name('history');

Route::get('/kategori-menu', [MenuController::class, 'kategori'])->name('kategori');
Route::get('/daftar-menu', [MenuController::class, 'menu'])->name('menu');

Route::get('/laporan-harian', [KeuanganController::class, 'laporan_harian'])->name('harian');
Route::get('/laporan-mingguan', [KeuanganController::class, 'laporan_mingguan'])->name('mingguan');
Route::get('/laporan-bulanan', [KeuanganController::class, 'laporan_bulanan'])->name('bulanan');

Route::get('/pengeluaran-bahan', [KeuanganController::class, 'bahan'])->name('pengeluaran_bahan');
Route::get('/pengeluaran-gaji', [KeuanganController::class, 'gaji'])->name('pengeluaran_gaji');
Route::get('/pengeluaran-operasional', [KeuanganController::class, 'operasional'])->name('pengeluaran_operasional');

Route::get('/laba-rugi', [KeuanganController::class, 'laba_rugi'])->name('laba_rugi');

Route::get('/kasir', [KasirController::class, 'index'])->name('kasir');


