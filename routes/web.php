<?php

use App\Http\Controllers\MapelController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AbsenMapelController;
use App\Http\Controllers\AbsenGuruController;
use App\Http\Controllers\JadwalmapelController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\Anggota_ekskulController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\Profil;
use App\Http\Controllers\JenisPelanggaranController;
use App\Http\Controllers\PelanggaranSiswaController;
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
        Route::post('/save_edit_siswa', 'save_edit_siswa')->name('save_edit_siswa');
        Route::get('/siswa_lulus', 'siswa_lulus')->name('siswa_lulus');
        Route::get('/profil_siswa', 'profil_siswa')->name('profil_siswa');
        Route::post('/lulus', 'lulus')->name('lulus');
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
    Route::controller(AbsenMapelController::class)->group(function () {
        Route::get('/absensi_siswaMapel', 'index')->name('absensi_siswaMapel');
        Route::get('/get_absenMapel', 'get_absen')->name('get_absenMapel');
        Route::get('/save_absenMapel', 'save_absenMapel')->name('save_absenMapel');
        Route::get('/btl_absenMapel', 'btl_absenMapel')->name('btl_absenMapel');
    });
    Route::controller(AbsenGuruController::class)->group(function () {
        Route::get('/absensi_guru', 'index')->name('absensi_guru');
        Route::get('/get_absenGuru', 'get_absenGuru')->name('get_absenGuru');
        Route::get('/save_absenGuru', 'save_absenGuru')->name('save_absenGuru');
        Route::get('/btl_absenGuru', 'btl_absenGuru')->name('btl_absenGuru');
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
    Route::controller(JenisPelanggaranController::class)->group(function () {
        Route::get('/jenis_pelanggaran', 'index')->name('jenis_pelanggaran');
        Route::post('/tambah_jenis_pelanggaran', 'tambah_jenis_pelanggaran')->name('tambah_jenis_pelanggaran');
        Route::get('/delete_jenis_pelanggaran', 'delete_jenis_pelanggaran')->name('delete_jenis_pelanggaran');
        Route::get('/get_edit_jenis_pelanggaran', 'get_edit_jenis_pelanggaran')->name('get_edit_jenis_pelanggaran');
        Route::post('/edit_jenis_pelanggaran', 'edit_jenis_pelanggaran')->name('edit_jenis_pelanggaran');
    });
    Route::controller(PelanggaranSiswaController::class)->group(function () {
        Route::get('/pelanggaran', 'index')->name('pelanggaran');
        Route::post('/tambah_pelanggaran', 'tambah_pelanggaran')->name('tambah_pelanggaran');
        Route::post('/edit_pelanggaran', 'edit_pelanggaran')->name('edit_pelanggaran');
        Route::get('/delete_pelanggaran', 'delete_pelanggaran')->name('delete_pelanggaran');
        Route::get('/get_edit_pelanggaran', 'get_edit_pelanggaran')->name('get_edit_pelanggaran');
    });
    Route::controller(GuruController::class)->group(function () {
        Route::get('/data_guru', 'index')->name('data_guru');
        Route::get('/tambah_data_guru', 'tambah_data_guru')->name('tambah_data_guru');
        Route::get('/edit_guru', 'edit_guru')->name('edit_guru');
        Route::post('/save_guru', 'save_guru')->name('save_guru');
        Route::post('/save_edit_guru', 'save_edit_guru')->middleware('web')->name('save_edit_guru');
        Route::get('/delete_guru', 'delete_guru')->name('delete_guru');
        Route::get('/profil_guru', 'profil_guru')->name('profil_guru');
        Route::get('/get_guru', 'get_guru')->name('get_guru');
        Route::post('/store', 'store')->middleware('web')->name('store');
    });
    Route::controller(NilaiController::class)->group(function () {
        Route::get('/nilai_rapor', 'index')->name('nilai_rapor');
        Route::get('/get_rapor_siswa', 'get_rapor_siswa')->name('get_rapor_siswa');
        Route::get('/save_nilai', 'save_nilai')->name('save_nilai');
    });
    Route::controller(EkskulController::class)->group(function () {
        Route::get('/ekskul', 'index')->name('ekskul');
        Route::post('/tambah_ekskul', 'tambah_ekskul')->name('tambah_ekskul');
        Route::post('/edit_ekskul', 'edit_ekskul')->name('edit_ekskul');
        Route::get('/get_edit_ekskul', 'get_edit_ekskul')->name('get_edit_ekskul');
        Route::get('/delete_ekskul', 'delete_ekskul')->name('delete_ekskul');
    });
    Route::controller(Anggota_ekskulController::class)->group(function () {
        Route::get('/anggota_ekskul', 'index')->name('anggota_ekskul');
        Route::get('/get_siswa', 'get_siswa')->name('get_siswa');
        Route::get('/get_edit_anggota_ekskul', 'get_edit_anggota_ekskul')->name('get_edit_anggota_ekskul');
        Route::post('/tambah_anggota_ekskul', 'tambah_anggota_ekskul')->name('tambah_anggota_ekskul');
        Route::post('/edit_anggota_ekskul', 'edit_anggota_ekskul')->name('edit_anggota_ekskul');
        Route::get('/delete_anggota_ekskul', 'delete')->name('delete_anggota_ekskul');
    });
    Route::controller(PrestasiController::class)->group(function () {
        Route::get('/prestasi_siswa', 'index')->name('prestasi_siswa');
        Route::get('/get_edit_prestasi', 'get_edit_prestasi')->name('get_edit_prestasi');
        Route::get('/delete_prestasi', 'delete')->name('delete_prestasi');
        Route::post('/tambah_siswa_prestasi', 'tambah_siswa_prestasi')->name('tambah_siswa_prestasi');
        Route::post('/edit_prestasi', 'edit_prestasi')->name('edit_prestasi');
    });
    Route::controller(AlumniController::class)->group(function () {
        Route::get('/alumni', 'index')->name('alumni');
    });
    Route::controller(Profil::class)->group(function () {
        Route::get('/profil', 'index')->name('profil');
        Route::post('/update_profil', 'update')->name('update_profil');
    });
    Route::controller(LaporanController::class)->group(function () {
        Route::get('/LaporanSiswa', 'LaporanSiswa')->name('LaporanSiswa');
        
        Route::get('/qr_siswa_perkelas', 'qr_siswa_perkelas')->name('qr_siswa_perkelas');

        Route::get('/LaporanGuru', 'LaporanGuru')->name('LaporanGuru');
        Route::get('/qr_guru', 'qr_guru')->name('qr_guru');
        

        
        Route::get('/LaporanAbsen', 'LaporanAbsen')->name('LaporanAbsen');
        Route::get('/qr_absensi_siswa', 'qr_absensi_siswa')->name('qr_absensi_siswa');

        Route::get('/LaporanAbsenGuru', 'LaporanAbsenGuru')->name('LaporanAbsenGuru');
        Route::get('/qr_absensi_siswa', 'qr_absensi_siswa')->name('qr_absensi_siswa');
        
        
        Route::get('/LaporanJadwalPelajaran', 'LaporanJadwalPelajaran')->name('LaporanJadwalPelajaran');
       
        Route::get('/qr_jadwal', 'qr_jadwal')->name('qr_jadwal');

        Route::get('/LaporanNilaiRapor', 'LaporanNilaiRapor')->name('LaporanNilaiRapor');
        Route::get('/get_nilai_siswa', 'get_nilai_siswa')->name('get_nilai_siswa');
        Route::get('/qr_nilai_siswa', 'qr_nilai_siswa')->name('qr_nilai_siswa');

        
        Route::get('/LaporanAnggotaEskul', 'LaporanAnggotaEskul')->name('LaporanAnggotaEskul');
        Route::get('/qr_ekskul', 'qr_ekskul')->name('qr_ekskul');
        

        Route::get('/LaporanPrestasiSiswa', 'LaporanPrestasiSiswa')->name('LaporanPrestasiSiswa');
        Route::get('/qr_prestasi', 'qr_prestasi')->name('qr_prestasi');
        

        Route::get('/LaporanRaporSiswa', 'LaporanRaporSiswa')->name('LaporanRaporSiswa');
        Route::get('/qr_rapor', 'qr_rapor')->name('qr_rapor');
        
        Route::get('/LaporanAbsenGuru', 'LaporanAbsenGuru')->name('LaporanAbsenGuru');
        Route::get('/QrAbsenGuru', 'QrAbsenGuru')->name('QrAbsenGuru');

        Route::get('/LaporanAbsen_mapel', 'LaporanAbsen_mapel')->name('LaporanAbsen_mapel');
        Route::get('/qr_absensi_mapel', 'qr_absensi_mapel')->name('qr_absensi_mapel');

    });
});
Route::controller(LaporanController::class)->group(function () {
    Route::get('/print_siswa', 'print_siswa')->name('print_siswa');
    Route::get('/print_guru', 'print_guru')->name('print_guru');
    Route::get('/print_absen', 'print_absen')->name('print_absen');
    Route::get('/print_jadwal', 'print_jadwal')->name('print_jadwal');
    Route::get('/print_nilai', 'print_nilai')->name('print_nilai');
    Route::get('/print_rapor', 'print_rapor')->name('print_rapor');
    Route::get('/print_prestasi', 'print_prestasi')->name('print_prestasi');
    Route::get('/print_ekskul', 'print_ekskul')->name('print_ekskul');
    Route::get('/print_absen_guru', 'print_absen_guru')->name('print_absen_guru');
    Route::get('/print_absen_mapel', 'print_absen_mapel')->name('print_absen_mapel');
});


Route::get('/dashboard', function () {
    $data = [
        'title' => 'Dashboard',
    ];
    return view('dashboard.dashboard', $data);
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
