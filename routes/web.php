<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    AdminController,
    NewsController,
    WisataController,
    PemesananController,
    AuthController,
    FasilitasSiblarakController
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

// Halaman profil user (hanya untuk user login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', fn() => view('profile'))->name('profile'); // Profil user
});

// Halaman profil desa
Route::get('/struktur', function () {
    return view('struktur');
})->name('struktur');

// Halaman beranda
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rute news
Route::get('/news', [NewsController::class, 'index'])->name('news.index');

// Grup middleware khusus admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('/admin/fasilitas-siblarak', FasilitasSiblarakController::class);

    // Konfirmasi pemesanan dan cek resi
    Route::get('/admin/pemesanan/confirm/{id}', [AdminController::class, 'confirmPemesanan'])->name('admin.pemesanan.confirm');
    Route::get('/admin/pemesanan/check', [AdminController::class, 'checkResi'])->name('admin.pemesanan.check');
});

// Grup rute pemesanan per wisata
Route::prefix('pemesanan')->group(function () {
    Route::get('/siblarak', [PemesananController::class, 'formSiblarak'])->name('pemesanan.siblarak');
    Route::post('/siblarak', [PemesananController::class, 'storeSiblarak'])->name('pemesanan.siblarak.store');

    Route::get('/kemanten', [PemesananController::class, 'formKemanten'])->name('pemesanan.kemanten');
    Route::post('/kemanten', [PemesananController::class, 'storeKemanten'])->name('pemesanan.kemanten.store');

    Route::get('/kampung-dolanan', [PemesananController::class, 'formKampungDolanan'])->name('pemesanan.kampung-dolanan');
    Route::post('/kampung-dolanan', [PemesananController::class, 'storeKampungDolanan'])->name('pemesanan.kampung-dolanan.store');
});

// Rute untuk halaman wisata
Route::prefix('wisata')->group(function () {
    // Halaman wisata Siblarak
    Route::get('/siblarak', [WisataController::class, 'showSiblarak'])->name('wisata.siblarak');

    // Halaman wisata Kemanten
    Route::get('/kemanten', [WisataController::class, 'showKemanten'])->name('wisata.kemanten');

    // Halaman wisata Kampung Dolanan
    Route::get('/kampung-dolanan', [WisataController::class, 'showKampungDolanan'])->name('wisata.kampung-dolanan');

    // Halaman UMKM Lokal
    Route::get('/umkm-lokal', [WisataController::class, 'showUmkmLokal'])->name('wisata.umkm-lokal');
});

// Rute default pemesanan
Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan.index');
Route::post('/pemesanan', [PemesananController::class, 'store'])->name('pemesanan.store');

