<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\GaleriController;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PengaturanController;
use App\Http\Controllers\Admin\PermohonanController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\PengaduanController as AdminPengaduanController;



use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\RiwayatPermohonanController;
use App\Http\Controllers\User\DokumenController;
use App\Http\Controllers\User\KtpController;
use App\Http\Controllers\User\PengaduanController as UserPengaduanController;
use App\Http\Controllers\User\FormController;







// =====================
// Halaman Utama
// =====================
Route::get('/', [HomeController::class, 'index'])->name('home');

// =====================
// Autentikasi
// =====================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// =====================
// Halaman Umum
// =====================
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');

// =====================
// Profil
// =====================
Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('/', [ProfilController::class, 'index'])->name('index');
    Route::get('/sejarah', [ProfilController::class, 'sejarah'])->name('sejarah');
    Route::get('/profil-kecamatan', [ProfilController::class, 'profilKecamatan'])->name('kecamatan');
    Route::get('/struktur-organisasi', [ProfilController::class, 'struktur'])->name('struktur');
    Route::get('/tupoksi', [ProfilController::class, 'tupoksi'])->name('tupoksi');
    Route::get('/program', [ProfilController::class, 'program'])->name('program');
    Route::get('/pegawai', [ProfilController::class, 'pegawai'])->name('pegawai');
});


// ==== Layanan === //
Route::prefix('layanan')->group(function () {
    Route::get('/', [LayananController::class, 'index'])->name('layanan.index');
    
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
  Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/statistik', [AdminDashboardController::class, 'getStatistik'])->name('dashboard.statistik');

     Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan');
    Route::post('/pengaturan/update-profil', [PengaturanController::class, 'updateProfil'])->name('pengaturan.updateProfil');
    Route::post('/pengaturan/update-password', [PengaturanController::class, 'updatePassword'])->name('pengaturan.updatePassword');
    Route::post('/pengaturan/tambah-akun', [PengaturanController::class, 'tambahAkun'])->name('pengaturan.tambahAkun');

    Route::get('/permohonan', [PermohonanController::class, 'index'])->name('permohonan.index');
    Route::get('/permohonan/{id}', [PermohonanController::class, 'show'])->name('permohonan.show');
    Route::get('admin/permohonan/{id}/edit', [PermohonanController::class, 'edit'])->name('permohonan.edit');
    Route::post('/permohonan/{id}/status', [PermohonanController::class, 'updateStatus'])->name('permohonan.updateStatus');
    
Route::get('/admin/pengaduan/{id}', [AdminPengaduanController::class, 'show'])->name('pengaduan.show');

    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/admin/laporan/cetak', [LaporanController::class, 'cetak'])->name('laporan.cetak');



});
    

Route::prefix('user')->name('user.')->middleware(['auth', 'role.user'])->group(function () {
    // Dashboard
     Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/statistik', [UserDashboardController::class, 'getStatistikSemua'])->name('dashboard.statistik');


    
    // Pengajuan form (static view, bisa diganti ke controller jika dinamis)
    Route::view('/pengajuan/create', 'user.pengajuan.create')->name('pengajuan.create');



    // Riwayat Permohonan
    Route::get('/riwayat-permohonan', [RiwayatPermohonanController::class, 'index'])->name('permohonan.riwayat');
    Route::get('/riwayat-permohonan/{id}', [RiwayatPermohonanController::class, 'show'])->name('riwayat.show');

   // --- Pengaduan ---
 Route::get('/pengaduan', [UserPengaduanController::class, 'index'])->name('pengaduan.index');
    Route::post('/pengaduan', [UserPengaduanController::class, 'store'])->name('pengaduan.store');
    Route::put('/pengaduan/{id}', [UserPengaduanController::class, 'update'])->name('pengaduan.update');
    Route::delete('/pengaduan/{id}', [UserPengaduanController::class, 'destroy'])->name('pengaduan.destroy');
Route::get('/pengaduan/{id}', [UserPengaduanController::class, 'show'])->name('pengaduan.show');
    Route::get('/pengaduan/{id}/edit', [UserPengaduanController::class, 'edit'])->name('pengaduan.edit');



Route::get('/layanan', [FormController::class, 'index'])->name('form.index');
Route::get('/layanan/{slug}', [FormController::class, 'create'])->name('form.create');
Route::post('/layanan/{slug}', [FormController::class, 'store'])->name('form.store');


});


