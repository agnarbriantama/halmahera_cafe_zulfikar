<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\StokBahanController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\KategoriMenuController;
use App\Http\Controllers\PembelianBahanController;
use App\Http\Controllers\TransaksiController;

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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::middleware(['auth', 'role:owner,admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/laporan-harian', [KeuanganController::class, 'laporan_harian'])->name('harian');
    Route::get('/laporan-mingguan', [KeuanganController::class, 'laporan_mingguan'])->name('mingguan');
    Route::get('/laporan-bulanan', [KeuanganController::class, 'laporan_bulanan'])->name('bulanan');
    Route::get('/laporan-harian/{tanggal}', [KeuanganController::class, 'detail_harian'])->name('detail.harian');
    Route::get('/laporan-mingguan/{tahun}/{minggu}', [KeuanganController::class, 'detail_mingguan'])->name('detail.mingguan');
    Route::get('/laporan-bulanan/{tahun}/{bulan}', [KeuanganController::class, 'detail_bulanan'])->name('detail.bulanan');

});

Route::middleware(['auth', 'role:admin'])->group(function () {

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

    Route::get('/daftar-menu', [MenuController::class, 'index'])->name('menu');
    Route::post('/daftar-menu', [MenuController::class, 'create'])->name('menu.create');
    Route::put('/daftar-menu/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('/daftar-menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
    Route::get('/daftar-menu/detail/{id}', [MenuController::class, 'detail'])->name('menu.detail');

    Route::post('/resep', [MenuController::class, 'createResep'])->name('resep.create');
    Route::put('/resep/{id}', [MenuController::class, 'updateResep'])->name('resep.update');
    Route::delete('/resep/{id}', [MenuController::class, 'destroyResep'])->name('resep.destroy');

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
});

    Route::get('/laba-rugi', [KeuanganController::class, 'laba_rugi'])->name('laba_rugi');

Route::middleware(['auth', 'role:kasir,admin'])->group(function () {
    Route::get('/kasir', [KasirController::class, 'index'])->name('kasir');
    Route::get('/riwayat-pesanan', [KasirController::class, 'riwayat'])->name('riwayat');
    Route::get('/transaksi/{id}/detail', [KasirController::class, 'detail'])->name('transaksi.detail');
    Route::get('/transaksi/{id}/ajax-detail', [KasirController::class, 'ajaxDetail']);
    Route::post('/transaksi/checkout', [TransaksiController::class, 'checkout'])->name('checkout');
    Route::get('/transaksi/{id}/print', [TransaksiController::class, 'print'])->name('transaksi.print');
});

