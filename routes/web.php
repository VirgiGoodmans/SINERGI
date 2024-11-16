<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController, AdminController, NewsController, WisataController,
    PemesananController, AuthController, FasilitasSiblarakController
};

// Rute login dan autentikasi
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Login melalui Google
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

// Rute registrasi
Route::get('/register', fn() => view('auth.register'))->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Halaman profile (hanya untuk user login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', fn() => view('profile'))->name('profile');
});

// Halaman beranda
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rute pemesanan
Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan.index');
Route::post('/pemesanan', [PemesananController::class, 'store'])->name('pemesanan.store');

// Rute news
Route::get('/news', [NewsController::class, 'index'])->name('news.index');

// Grup middleware khusus admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Dashboard admin
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Manajemen fasilitas Siblarak
    Route::resource('/admin/fasilitas-siblarak', FasilitasSiblarakController::class);

    // Konfirmasi pemesanan dan cek resi
    Route::get('/admin/pemesanan/confirm/{id}', [AdminController::class, 'confirmPemesanan'])->name('admin.pemesanan.confirm');
    Route::get('/admin/pemesanan/check', [AdminController::class, 'checkResi'])->name('admin.pemesanan.check');
});

// Rute untuk halaman wisata
Route::prefix('wisata')->group(function () {
    // Wisata Siblarak
    Route::get('/siblarak', [WisataController::class, 'showSiblarak'])->name('wisata.siblarak');
    Route::post('/siblarak/pemesanan', [WisataController::class, 'storeSiblarak'])->name('wisata.siblarak.pemesanan');

    // Wisata Kemanten
    Route::get('/kemanten', [WisataController::class, 'showKemanten'])->name('wisata.kemanten');
    Route::post('/kemanten/pemesanan', [WisataController::class, 'storeKemanten'])->name('wisata.kemanten.pemesanan');

    // Wisata Kampung Dolanan
    Route::get('/kampung-dolanan', [WisataController::class, 'showKampungDolanan'])->name('wisata.kampung-dolanan');
    Route::post('/kampung-dolanan/pemesanan', [WisataController::class, 'storeKampungDolanan'])->name('wisata.kampung-dolanan.pemesanan');

    // UMKM Lokal
    Route::get('/umkm-lokal', [WisataController::class, 'showUmkmLokal'])->name('wisata.umkm-lokal');
    Route::post('/umkm-lokal/pemesanan', [WisataController::class, 'storeUmkmLokal'])->name('wisata.umkm-lokal.pemesanan');
});
