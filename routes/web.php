<?php

use App\Http\Controllers\MapelController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\JadwalmapelController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\Anggota_ekskulController;
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
    Route::controller(KelasController::class)->group(function () {
        Route::get('/data_kelas', 'index')->name('data_kelas');
        Route::post('/tambah_kelas', 'tambah_kelas')->name('tambah_kelas');
        Route::post('/edit_kelas', 'edit_kelas')->name('edit_kelas');
        Route::get('/delete_kelas', 'delete_kelas')->name('delete_kelas');
        Route::get('/get_edit_kelas', 'get_edit_kelas')->name('get_edit_kelas');
    });
    Route::controller(AbsenController::class)->group(function () {
        Route::get('/absensi_siswa', 'index')->name('absensi_siswa');
        Route::get('/get_absen', 'get_absen')->name('get_absen');
        Route::get('/save_absen', 'save_absen')->name('save_absen');
        Route::get('/btl_absen', 'btl_absen')->name('btl_absen');
    });

    Route::controller(MapelController::class)->group(function () {
        Route::get('/data_mapel', 'index')->name('data_mapel');
        Route::post('/tambah_mapel', 'tambah_mapel')->name('tambah_mapel');
        Route::post('/edit_mapel', 'edit_mapel')->name('edit_mapel');
        Route::get('/delete_mapel', 'delete_mapel')->name('delete_mapel');
        Route::get('/get_edit_mapel', 'get_edit_mapel')->name('get_edit_mapel');
    });
    Route::controller(JadwalmapelController::class)->group(function () {
        Route::get('/jadwal_mapel', 'index')->name('jadwal_mapel');
        Route::post('/save_jadwal', 'save_jadwal')->name('save_jadwal');
    });
    Route::controller(GuruController::class)->group(function () {
        Route::get('/data_guru', 'index')->name('data_guru');
        Route::get('/tambah_data_guru', 'tambah_data_guru')->name('tambah_data_guru');
        Route::post('/save_guru', 'save_guru')->name('save_guru');
        Route::get('/delete_guru', 'delete_guru')->name('delete_guru');
    });
    Route::controller(NilaiController::class)->group(function () {
        Route::get('/nilai_rapor', 'index')->name('nilai_rapor');
        Route::get('/get_rapor_siswa', 'get_rapor_siswa')->name('get_rapor_siswa');
        Route::get('/save_nilai', 'save_nilai')->name('save_nilai');
    });
    Route::controller(EkskulController::class)->group(function () {
        Route::get('/ekskul', 'index')->name('ekskul');
        Route::post('/tambah_ekskul', 'tambah_ekskul')->name('tambah_ekskul');
        Route::get('/delete_ekskul', 'delete_ekskul')->name('delete_ekskul');
    });
    Route::controller(Anggota_ekskulController::class)->group(function () {
        Route::get('/anggota_ekskul', 'index')->name('anggota_ekskul');
        Route::get('/get_siswa', 'get_siswa')->name('get_siswa');
    });
});


Route::get('/dashboard', function () {
    $data = [
        'title' => 'Dashboard',
    ];
    return view('dashboard.dashboard', $data);
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
