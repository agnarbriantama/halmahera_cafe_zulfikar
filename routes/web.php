<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\StokBahanController;
use App\Http\Controllers\SupplierController;
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
Route::post('/stok-bahan', [StokBahanController::class, 'store'])->name('bahan.store');
Route::put('/stok-bahan/{id}', [StokBahanController::class, 'update'])->name('bahan.update');
Route::delete('/stok-bahan/{id}', [StokBahanController::class, 'destroy'])->name('bahan.destroy');

Route::get('/stok', [StokBahanController::class, 'stok_bahan'])->name('stok');

Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');
Route::post('/supplier', [SupplierController::class, 'create'])->name('supplier.create');
Route::put('/supplier/{id}', [SupplierController::class, 'update'])->name('supplier.update');
Route::delete('/supplier/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');

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


