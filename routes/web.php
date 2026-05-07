<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\StokBahanController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\KategoriMenuController;
use App\Http\Controllers\PembelianBahanController;

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
Route::post('/stok/tambah', [StokBahanController::class, 'tambah'])->name('stok.tambah');
Route::post('/stok/pengurangan', [StokBahanController::class, 'pengurangan'])->name('stok.pengurangan');

Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');
Route::post('/supplier', [SupplierController::class, 'create'])->name('supplier.create');
Route::put('/supplier/{id}', [SupplierController::class, 'update'])->name('supplier.update');
Route::delete('/supplier/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');

Route::get('/history-stok', [StokBahanController::class, 'history'])->name('history');

Route::get('/kategori-menu', [KategoriMenuController::class, 'index'])->name('kategori');
Route::post('/kategori-menu', [KategoriMenuController::class, 'create'])->name('kategori.create');
Route::put('/kategori-menu/{id}', [KategoriMenuController::class, 'update'])->name('kategori.update');
Route::delete('/kategori-menu/{id}', [KategoriMenuController::class, 'destroy'])->name('kategori.destroy');

Route::get('/daftar-menu', [MenuController::class, 'menu'])->name('menu');

Route::get('/laporan-harian', [KeuanganController::class, 'laporan_harian'])->name('harian');
Route::get('/laporan-mingguan', [KeuanganController::class, 'laporan_mingguan'])->name('mingguan');
Route::get('/laporan-bulanan', [KeuanganController::class, 'laporan_bulanan'])->name('bulanan');

Route::get('/pengeluaran-bahan', [PembelianBahanController::class, 'index'])->name('pengeluaran_bahan');
Route::post('/pengeluaran-bahan', [PembelianBahanController::class, 'store'])->name('keuangan-bahan.store');

Route::get('/pengeluaran-gaji', [KeuanganController::class, 'gaji'])->name('pengeluaran_gaji');
Route::post('/pengeluaran-gaji', [KeuanganController::class, 'createGaji'])->name('gaji.create');
Route::put('/pengeluaran-gaji/{id}', [KeuanganController::class, 'updateGaji'])->name('gaji.update');
Route::delete('/pengeluaran-gaji/{id}', [KeuanganController::class, 'destroyGaji'])->name('gaji.destroy');

Route::get('/pengeluaran-operasional', [KeuanganController::class, 'operasional'])->name('pengeluaran_operasional');
Route::post('/pengeluaran-operasional', [KeuanganController::class, 'createOperasional'])->name('operasional.create');
Route::put('/pengeluaran-operasional/{id}', [KeuanganController::class, 'updateOperasional'])->name('operasional.update');
Route::delete('/pengeluaran-operasional/{id}', [KeuanganController::class, 'destroyOperasional'])->name('operasional.destroy');

Route::get('/laba-rugi', [KeuanganController::class, 'laba_rugi'])->name('laba_rugi');

Route::get('/kasir', [KasirController::class, 'index'])->name('kasir');


