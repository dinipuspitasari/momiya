<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PoliklinikController;
use App\Http\Controllers\ReservasiController;
use App\Http\Middleware\CheckLevel;
use App\Models\Level; // Pastikan ini ada di bagian atas file controller
use App\Models\Poliklinik;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/faq', function () {
    return view('faq');
});
Route::get('/contact', function () {
    return view('contact');
});
// Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
// Route::post('/login', [AuthenticatedSessionController::class, 'store']);
// Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Route::middleware(['auth', 'level:1'])->group(function () {
//     Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
// });

// Route::middleware(['auth', 'level:2'])->group(function () {
//     Route::get('/dokter', [DokterController::class, 'index'])->name('dokter.dashboard');
// });

// Route::middleware(['auth', 'level:3'])->group(function () {
//     Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.dashboard');
// });

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware(CheckLevel::class.':1')->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/create', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/destroy/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('/dokter', [DokterController::class, 'index'])->name('dokter.index');
    Route::get('/dokter/details/{id}', [DokterController::class, 'details']);
    Route::get('/dokter/create', [DokterController::class, 'create'])->name('dokter.create');
    Route::post('/dokter/create', [DokterController::class, 'store'])->name('dokter.store');
    Route::get('/dokter/edit/{dokter}', [DokterController::class, 'edit'])->name('dokter.edit');
    Route::post('/dokter/update/{dokter}', [DokterController::class, 'update'])->name('dokter.update');
    Route::delete('/dokter/destroy/{dokter}', [DokterController::class, 'destroy'])->name('dokter.destroy');

    Route::get('/poliklinik', [PoliklinikController::class, 'index'])->name('poliklinik.index');

    Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');
    // Route::get('/dokter/details/{id}', [DokterController::class, 'details']);
    // Route::get('/dokter/create', [DokterController::class, 'create'])->name('dokter.create');
    // Route::post('/dokter/create', [DokterController::class, 'store'])->name('dokter.store');
    // Route::get('/dokter/edit/{dokter}', [DokterController::class, 'edit'])->name('dokter.edit');
    // Route::post('/dokter/update/{dokter}', [DokterController::class, 'update'])->name('dokter.update');
    // Route::delete('/dokter/destroy/{dokter}', [DokterController::class, 'destroy'])->name('dokter.destroy');

    Route::resource('jadwal', JadwalController::class);
    Route::get('/get-poli/{dokter_id}', [JadwalController::class, 'getPoliklinik']);
    Route::put('/reservasi/{id}/status', [ReservasiController::class, 'updateStatus'])->name('updateStatus');
    Route::get('/admin/reservasi', [ReservasiController::class, 'adminIndex'])->name('reservasi.adminIndex');
    Route::get('/admin/reservasi/{id}', [ReservasiController::class, 'adminShow'])->name('reservasi.adminShow');
    Route::put('/admin/reservasi/{id}/status', [ReservasiController::class, 'updateStatus'])->name('reservasi.updateStatus');


});


Route::middleware(CheckLevel::class.':3')->group(function () { 
    Route::get('/reservasi', [ReservasiController::class, 'index'])->name('reservasi.index');
    Route::get('/reservasi/create', [ReservasiController::class, 'create'])->name('reservasi.create');
    Route::post('/reservasi/create', [ReservasiController::class, 'store'])->name('reservasi.store');
    // Route::post('/reservasi', action: [ReservasiController::class, 'store'])->name('reservasi.store');
    Route::get('/reservasi/{id}', [ReservasiController::class, 'show'])->name('reservasi.show');
    Route::get('/reservasi/{id}/edit', [ReservasiController::class, 'edit'])->name('reservasi.edit');
    Route::put('/reservasi/{id}', [ReservasiController::class, 'update'])->name('reservasi.update');
});
Route::get('/forbidden', function () {
    return view('forbidden'); // Pastikan nama view sesuai
})->name('forbidden');

// Route::middleware(['auth:sanctum', 'verified'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');

    // Route untuk Admin (level_id = 1)
    
    // Route untuk Dokter (level_id = 2)
    Route::middleware(CheckLevel::class.':2')->group(function () {
       
    });

    // Route untuk Pasien (level_id = 3)
    // Route::middleware(CheckLevel::class.':3')->group(function () {
    //     Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');
        // Tambahkan route lain sesuai kebutuhan
    // });



Route::middleware(['auth:sanctum',  config('jetstream.auth_session'), 'verified', 'Dokter'])->group(function () {
});


Route::match(['get', 'post'], '/botman', 'App\Http\Controllers\BotManController@handle');