<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\JurnalumumController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LaporanController;

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

Route::get('/', function () {
    // return view('welcome');
    return redirect('/login');
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function() {
    return view('dashboard.index', [
        "title" => "Dashboard",
    ]);
});

Route::resource('/akuns', AkunController::class)->middleware('auth');

Route::resource('/kategoriproduks', KategoriProdukController::class)->middleware('auth');

Route::resource('/users', UserController::class)->middleware('auth');

Route::resource('/produks', ProdukController::class)->middleware('auth');

Route::resource('/pelanggans', PelangganController::class)->middleware('auth');

Route::resource('/jurnalumums', JurnalumumController::class)->middleware('auth');

Route::get('/laporan/laporan-neraca-saldo', [LaporanController::class, 'tampilNeracaSaldo'])->name('laporan-neraca-saldo')->middleware('auth');
Route::get('/laporan/laporan-jurnal-umum', [LaporanController::class, 'tampilJurnalUmum'])->name('laporan-jurnal-umum')->middleware('auth');
