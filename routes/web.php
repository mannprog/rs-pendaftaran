<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PembayaranPasienController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PendaftaranPasienController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TindakanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('homepage.welcome');
})->name('homepage');

Route::get('/profil', function() {
    return view('homepage.pages.profil');
})->name('homepage.profil');

Route::prefix('pelayanan/')->group(function () {
    Route::name('pelayanan.')->group(function () {
        Route::get('/poli-kandung', function() {
            return view('homepage.pages.poli-kandung');
        })->name('poli.kandung');
        Route::get('/poli-anak', function() {
            return view('homepage.pages.poli-anak');
        })->name('poli.anak');
        Route::get('/poli-penyakitdalam', function() {
            return view('homepage.pages.poli-penyakitdalam');
        })->name('poli.penyakitdalam');
        Route::get('/poli-saraf', function() {
            return view('homepage.pages.poli-saraf');
        })->name('poli.saraf');
        Route::get('/poli-bedah', function() {
            return view('homepage.pages.poli-bedah');
        })->name('poli.bedah');
        Route::get('/poli-tht', function() {
            return view('homepage.pages.poli-tht');
        })->name('poli.tht');
        Route::get('/poli-laboratorium', function() {
            return view('homepage.pages.poli-laboratorium');
        })->name('poli.laboratorium');
        Route::get('/poli-radiologi', function() {
            return view('homepage.pages.poli-radiologi');
        })->name('poli.radiologi');
    });
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'prosesLogin'])->name('prosesLogin');
    Route::get('/registrasi', [AuthController::class, 'registrasi'])->name('registrasi');
    Route::post('/registrasi', [AuthController::class, 'prosesRegistrasi'])->name('prosesRegistrasi');
});

Route::middleware('auth')->group(function () {
    Route::middleware('admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'indexAdmin'])->name('admin.dashboard');
        Route::prefix('users/')->group(function () {
            Route::name('users.')->group(function () {
                Route::resource('petugas', PetugasController::class);
                Route::resource('pasien', PasienController::class);
                Route::get('/pasien-export', [PasienController::class, 'export'])->name('pasien.export');
            });
        });
        Route::resource('layanan', LayananController::class);
        Route::resource('dokter', DokterController::class);
        Route::resource('tindakan', TindakanController::class);
        Route::resource('obat', ObatController::class);
        Route::resource('pendaftaran', PendaftaranController::class);
        Route::get('/laporan/pendaftaran', [PendaftaranController::class, 'export'])->name('pendaftaran.export');
        Route::post('/pendaftaran/{pendaftaran}/add-data', [PendaftaranController::class, 'addData'])->name('add.tindakan');
        Route::post('/pendaftaran/{pendaftaran}/del-data', [PendaftaranController::class, 'delData'])->name('del.tindakan');
        Route::post('/pendaftaran/{pendaftaran}/add-obat', [PendaftaranController::class, 'addObat'])->name('add.obat');
        Route::post('/pendaftaran/{pendaftaran}/del-obat', [PendaftaranController::class, 'delObat'])->name('del.obat');
        Route::resource('pembayaran', PembayaranController::class);
        Route::post('/pembayaran/{pembayaran}', [PembayaranController::class, 'accept'])->name('acc.bukti');
    });

    Route::get('/pembayaran/{pembayaran}/invoice', [PembayaranController::class, 'invoice'])->name('invoice');

    Route::get('pasien', [DashboardController::class, 'indexPasien'])->name('pasien.dashboard');
    Route::name('pasien.')->group(function () {
        Route::resource('pasien/pendaftaran', PendaftaranPasienController::class);
        Route::resource('pasien/pembayaran', PembayaranPasienController::class);
        Route::post('pasien/pembayaran/{pembayaran}/upload', [PembayaranPasienController::class, 'bukti'])->name('upload');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
