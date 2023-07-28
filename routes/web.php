<?php

use Illuminate\Support\Facades\Route;

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

Route::get('login', function() {
    return view('auth.login');
})->name('login');
Route::get('registrasi', function() {
    return view('auth.registrasi');
})->name('registrasi');

Route::get('dashboard', function() {
    return view('admin.dashboard');
})->name('dashboard');
