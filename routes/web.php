<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
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

Route::get('/kasir', [KasirController::class, 'index'])->name('kasir');


