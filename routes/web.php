<?php

use App\Http\Controllers\DataobatController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ReportinController;
use App\Http\Controllers\ReportoutController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'Admin'])->group(function () {
    // Route::get('/homeadmin', function () {
    //     return view('admin.index');})->name('admin.index');
    Route::get('/listobat', [DataobatController::class, 'index'])->name('listobat');
    // Route::get('/kasiradmin', [KasirController::class, 'index'])->name('kasiradmin');
    Route::resource('dataobat', DataobatController::class);
    // Route::resource('kasir', KasirController::class);
    // Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
    Route::resource('pengguna', PenggunaController::class);
    Route::resource('laporanmasuk', ReportinController::class);
    Route::resource('laporankeluar', ReportoutController::class);
});

Route::middleware(['auth', 'Kasir'])->group(function () {
    Route::get('/homekasir', [KasirController::class, 'index'])->name('homekasir');
    Route::post('/add-to-cart', [KasirController::class, 'addToCart'])->name('add-to-cart');
    Route::post('/checkout', [KasirController::class, 'checkout'])->name('checkout');
    Route::get('/cart', [KasirController::class, 'showCart'])->name('cart');
});


Route::get('exportExcel', [EmployeeController::class, 'exportExcel'])->name('employees.exportExcel');

Route::get('exportPdf', [EmployeeController::class, 'exportPdf'])->name('employees.exportPdf');
