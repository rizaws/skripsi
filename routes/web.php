<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\SiswaController;
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
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {


    Route::get('user', [UserController::class, 'index'])->name('user');
    Route::post('tambah_user', [UserController::class, 'create'])->name('tambah_user');
    Route::post('edit_user', [UserController::class, 'update'])->name('edit_user');
    Route::get('/hapus_user/{id}', [UserController::class, 'destroy'])->name('hapus_user');

    // laporan
    Route::get('lap_masuk/{jenis}', [LaporanController::class, 'suratMasuk'])->name('lap_masuk');
    Route::get('saveLapMasuk', [LaporanController::class, 'saveLapMasuk'])->name('saveLapMasuk');


    Route::controller(SiswaController::class)->group(function () {
        Route::get('/data_siswa', 'index')->name('data_siswa');
        Route::get('/add_siswa', 'tbh_siswa')->name('add_siswa');
        Route::post('/save_siswa', 'save_siswa')->name('save_siswa');
        Route::get('/detail_siswa', 'detail')->name('detail_siswa');
        Route::get('/delete_siswa', 'delete_siswa')->name('delete_siswa');
        Route::get('/edit_siswa', 'edit_siswa')->name('edit_siswa');
        Route::get('/save_edit_siswa', 'save_edit_siswa')->name('save_edit_siswa');
    });
});


Route::get('/dashboard', function () {
    $data = [
        'title' => 'Dashboard',
    ];
    return view('dashboard.dashboard', $data);
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
