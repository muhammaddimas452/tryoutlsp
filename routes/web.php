<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    AdminController,
    DataArtikelController,
    DataKategoriController,
    UserController
};

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


Route::get('/login', [AuthController::class,'viewLogin'])->middleware('guest')->name('login');
Route::post('/log', [AuthController::class,'login'])->middleware('guest')->name('loginProses');
Route::get('/logout', [AuthController::class, "logout"])->name('logout');
Route::get('/', [UserController::class,'index'])->name('beranda');
Route::get('/artikel', [UserController::class, "artikel"])->name('artikel');
Route::get('/detail-artikel/{id}', [UserController::class, "show"])->name('detailArtikel');

Route::group(['auth:sanctum'], function() {
    Route::middleware('role:admin')->prefix('admin')->group(function(){
        Route::get('/dashboard', [AdminController::class,'index'])->name('dashboard');

        Route::get('/data-artikel', [DataArtikelController::class,'index'])->name('dataArtikel');
        Route::get('/data-artikel/add-artikel', [DataArtikelController::class,'create'])->name('addArtikel');
        Route::post('/saveArtikel', [DataArtikelController::class,'store'])->name('saveArtikel');
        Route::post('/detailArtikel/{id}', [DataArtikelController::class,'show'])->name('showArtikel');
        Route::get('/data-artikel/edit-artikel/{id}', [DataArtikelController::class,'edit'])->name('editArtikel');
        Route::post('/updateArtikel/{id}', [DataArtikelController::class,'update'])->name('updateArtikel');
        Route::get('/deleteArtikel/{id}', [DataArtikelController::class,'destroy'])->name('deleteArtikel');

        Route::get('/data-kategori', [DataKategoriController::class,'index'])->name('dataKategori');
        Route::post('/saveKategori', [DataKategoriController::class,'store'])->name('saveKategori');
        Route::get('/detailKategori/{id}', [DataKategoriController::class,'show'])->name('showKategori');
        Route::get('/data-kategori/edit-kategori/{id}', [DataKategoriController::class,'edit'])->name('editKategori');
        Route::post('/updateKategori/{id}', [DataKategoriController::class,'update'])->name('updateKategori');
        Route::get('/deleteKategori/{id}', [DataKategoriController::class,'destroy'])->name('deleteKategori');
    });
});