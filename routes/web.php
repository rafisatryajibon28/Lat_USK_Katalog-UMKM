<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\Admin\ProdukController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Katalog UMKM Siswa SMK
|--------------------------------------------------------------------------
*/

// Halaman Publik
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/katalog', [KatalogController::class, 'index'])->name('katalog');
Route::get('/detail/{id}', [KatalogController::class, 'show'])->name('detail');

// Admin CRUD
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [ProdukController::class, 'index'])->name('index');
    Route::get('/tambah', [ProdukController::class, 'create'])->name('tambah');
    Route::post('/tambah', [ProdukController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('edit');
    Route::put('/edit/{id}', [ProdukController::class, 'update'])->name('update');
    Route::delete('/hapus/{id}', [ProdukController::class, 'destroy'])->name('hapus');
});
