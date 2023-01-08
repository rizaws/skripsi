<?php

use App\Http\Controllers\DivisiController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/lap_masuk', function () {
        return view('surat_keluar.surat_keluar', ['title' => 'tes']);
    })->name('lap_masuk');
    
    Route::get('divisi', [DivisiController::class, 'index'])->name('divisi');
    Route::post('tambah_divisi', [DivisiController::class, 'store'])->name('tambah_divisi');
    Route::get('hapus_divisi/{id}', [DivisiController::class, 'destroy'])->name('hapus_divisi');
    Route::post('edit_divisi', [DivisiController::class, 'update'])->name('edit_divisi');


    Route::get('surat_masuk', [SuratMasukController::class, 'index'])->name('surat_masuk');
    Route::post('tambah_surat_masuk', [SuratMasukController::class, 'store'])->name('tambah_surat_masuk');
    Route::post('edit_surat_masuk', [SuratMasukController::class, 'update'])->name('edit_surat_masuk');
    Route::get('hapus_surat_masuk/{id}', [SuratMasukController::class, 'destroy'])->name('hapus_surat_masuk');


    Route::get('surat_keluar', [SuratKeluarController::class, 'index'])->name('surat_keluar');
});


Route::get('/dashboard', function () {
    $data = [
        'title' => 'Dashboard'
    ];
    return view('dashboard.dashboard', $data);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
