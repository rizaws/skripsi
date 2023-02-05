<?php
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


});


Route::get('/dashboard', function () {
    $data = [
        'title' => 'Dashboard',
    ];
    return view('dashboard.dashboard', $data);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
