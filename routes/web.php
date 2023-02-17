<?php

use App\Http\Controllers\AutentikasiController;
use App\Http\Controllers\DasborController;
use App\Http\Controllers\MasterData\KelasController;
use App\Http\Controllers\MasterData\SiswaController;
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

// autentikasi
Route::prefix('autentikasi')->group(function () {
    Route::name('autentikasi.')->group(function () {
        Route::get('/masuk', [AutentikasiController::class, 'masuk'])->name('masuk');
        Route::post('/masuk', [AutentikasiController::class, 'prosesMasuk'])->name('proses-masuk');
        Route::get('/keluar', [AutentikasiController::class, 'keluar'])->name('keluar');
    });
});

Route::middleware('auth')->group(function () {
    // dasbor
    Route::get('/', [DasborController::class, 'index'])->name('dasbor');

    // master data
    Route::prefix('master-data')->group(function () {
        Route::name('master-data.')->group(function () {
            Route::get('/kelas', [KelasController::class, 'index'])->name('kelas');
            Route::get('/kelas/data', [KelasController::class, 'data'])->name('kelas.data');
            Route::get('/kelas/hapus/{uuid}', [KelasController::class, 'hapus'])->whereUuid('uuid')->name('kelas.hapus');
            Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
            Route::get('/siswa/data', [SiswaController::class, 'data'])->name('siswa.data');
            Route::get('/siswa/hapus/{uuid}', [SiswaController::class, 'hapus'])->whereUuid('uuid')->name('siswa.hapus');
        });
    });
});
