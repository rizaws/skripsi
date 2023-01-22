<?php

use App\Http\Controllers\DivisiController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\SuratDisposisiController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\UserController;
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

    // disposisi
    Route::get('surat_disposisi', [SuratDisposisiController::class, 'index'])->name('surat_disposisi');
    Route::get('hapus_surat_disposisi/{id}/{id_sm}', [SuratDisposisiController::class, 'destroy'])->name('hapus_surat_disposisi');
    Route::post('tambahSuratDisposisi', [SuratDisposisiController::class, 'tambahSuratDisposisi'])->name('tambahSuratDisposisi');
    Route::post('edit_surat_disposisi', [SuratDisposisiController::class, 'update'])->name('edit_surat_disposisi');
    
    // jenis surat
    Route::get('jenis_surat', [JenisSuratController::class, 'index'])->name('jenis_surat');
    Route::get('/hapus_js/{id}', [JenisSuratController::class, 'destroy'])->name('hapus_js');
    Route::post('tambah_js', [JenisSuratController::class, 'tambah_js'])->name('tambah_js');
    Route::post('edit_js', [JenisSuratController::class, 'update'])->name('edit_js');
    
    Route::get('surat_keluar', [SuratKeluarController::class, 'index'])->name('surat_keluar');
    Route::post('tambah_surat_keluar', [SuratKeluarController::class, 'store'])->name('tambah_surat_keluar');
    Route::post('edit_surat_keluar', [SuratKeluarController::class, 'update'])->name('edit_surat_keluar');
    Route::get('hapus_surat_keluar/{id}', [SuratKeluarController::class, 'destroy'])->name('hapus_surat_keluar');
    
    Route::get('user', [UserController::class, 'index'])->name('user');
    Route::post('tambah_user', [UserController::class, 'create'])->name('tambah_user');
    Route::post('edit_user', [UserController::class, 'update'])->name('edit_user');
    Route::get('/hapus_user/{id}', [UserController::class, 'destroy'])->name('hapus_user');
});


Route::get('/dashboard', function () {
    $data = [
        'title' => 'Dashboard'
    ];
    return view('dashboard.dashboard', $data);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
