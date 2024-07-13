<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AngsuranController;
use App\Http\Controllers\AkunController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::post('actionlogin', [AuthController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [AuthController::class, 'actionlogout'])->name('actionlogout');
Route::get('login',[AuthController::class, 'indexLogin'])->name('login');
Route::get('registrasi',[AuthController::class, 'indexRegister'])->name('register');
Route::get('/', function(){
    return view('dashboard.index');
});
Route::prefix('users')->group(function () {
    Route::get('/', [DashboardController::class, 'DashboardUser'])->name('user.index');
    Route::get('/verifikasi', [DashboardController::class, 'VerifikasiUser'])->name('user.verifikasi');
    Route::get('/profil', [MemberController::class, 'profil'])->name('member.profil');
    Route::prefix('pinjaman')->group(function () {
        Route::get('/', [PinjamanController::class, 'indexUser'])->name('pinjaman.indexUser');

    });
    Route::prefix('simpanan')->group(function () {
        Route::get('/', [SimpananController::class, 'indexUser'])->name('simpanan.indexUser');

    });
    Route::prefix('angsuran')->group(function () {
        Route::get('/', [AngsuranController::class, 'indexUser'])->name('angsuran.indexUser');
    });
});

Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'DashboardAdmin'])->name('admin.index');
    Route::post('/store', [MemberController::class, 'store'])->name('member.store');
});

Route::prefix('members')->group(function () {
    Route::get('/all', [MemberController::class, 'index'])->name('member.index');
    Route::get('/search', [MemberController::class, 'search'])->name('member.search');
    Route::get('/add', [MemberController::class, 'create'])->name('member.create');
    Route::put('/approve/{id}', [MemberController::class, 'approve'])->name('member.approve');
    Route::put('/reject/{id}', [MemberController::class, 'reject'])->name('member.reject');
    Route::get('/edit/{id}', [MemberController::class, 'edit'])->name('member.edit');
    Route::put('/update/{id}', [MemberController::class, 'update'])->name('member.update');
    Route::get('/detail/{id}', [MemberController::class, 'show'])->name('member.show');
    Route::post('/delete/{id}', [MemberController::class, 'delete'])->name('member.delete');
    Route::get('/download/{id}', [MemberController::class, 'downloadPdf'])->name('member.download');
});
Route::prefix('simpanan')->group(function () {
    Route::get('/all', [SimpananController::class, 'index'])->name('simpanan.index');
    Route::get('/add', [SimpananController::class, 'create'])->name('simpanan.create');
    Route::post('/store', [SimpananController::class, 'store'])->name('simpanan.store');
    Route::get('/edit/{id}', [SimpananController::class, 'edit'])->name('simpanan.edit');
    Route::put('/update/{id}', [SimpananController::class, 'update'])->name('simpanan.update');
    Route::put('/status/{id}', [SimpananController::class, 'status'])->name('simpanan.status');
    Route::get('/detail/{id}', [SimpananController::class, 'show'])->name('simpanan.show');
    Route::post('/delete/{id}', [SimpananController::class, 'delete'])->name('simpanan.delete');
    Route::get('/download/{id}', [SimpananController::class, 'downloadPdf'])->name('simpanan.download');
});
Route::prefix('pinjaman')->group(function () {
    Route::get('/all', [PinjamanController::class, 'index'])->name('pinjaman.index');
    Route::get('/add', [PinjamanController::class, 'create'])->name('pinjaman.create');
    Route::post('/store', [PinjamanController::class, 'store'])->name('pinjaman.store');
    Route::get('/edit/{id}', [PinjamanController::class, 'edit'])->name('pinjaman.edit');
    Route::put('/update/{id}', [PinjamanController::class, 'update'])->name('pinjaman.update');
    Route::get('/detail/{id}', [PinjamanController::class, 'show'])->name('pinjaman.show');
    Route::put('/approve/{id}', [PinjamanController::class, 'approve'])->name('pinjaman.approve');
    Route::put('/reject/{id}', [PinjamanController::class, 'reject'])->name('pinjaman.reject');
    Route::post('/delete/{id}', [PinjamanController::class, 'delete'])->name('pinjaman.delete');
    Route::get('/download/{id}', [PinjamanController::class, 'printPinjamanPdf'])->name('pinjaman.download');
});
Route::prefix('angsuran')->group(function () {
    Route::get('/all', [AngsuranController::class, 'index'])->name('angsuran.index');
    Route::get('/add', [AngsuranController::class, 'create'])->name('angsuran.create');
    Route::post('/store', [AngsuranController::class, 'store'])->name('angsuran.store');
    Route::get('/edit/{id}', [AngsuranController::class, 'edit'])->name('angsuran.edit');
    Route::put('/update', [AngsuranController::class, 'update'])->name('angsuran.update');
    Route::get('/detail/{id}', [AngsuranController::class, 'show'])->name('angsuran.show');
    Route::get('/download/{id}', [AngsuranController::class, 'printAngsuranPdf'])->name('angsuran.download');
});
Route::prefix('akun')->group(function () {
    Route::get('/search', [AkunController::class, 'search'])->name('akun.search');
    Route::get('/all', [AkunController::class, 'index'])->name('akun.index');
    Route::get('/add', [AkunController::class, 'create'])->name('akun.create');
    Route::post('/store', [AkunController::class, 'store'])->name('akun.store');
    Route::get('/edit/{id}', [AkunController::class, 'edit'])->name('akun.edit');
    Route::put('/update/{id}', [AkunController::class, 'update'])->name('akun.update');
    Route::get('/detail/{id}', [AkunController::class, 'show'])->name('akun.show');
    Route::post('/delete/{id}', [AkunController::class, 'delete'])->name('akun.delete');

});

