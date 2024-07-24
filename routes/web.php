<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AngsuranController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\NotificationController;


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
    Route::get('/', [DashboardController::class, 'DashboardAdmin'])->middleware(['role:admin','auth'])->name('admin.index');
    Route::post('/store', [MemberController::class, 'store'])->middleware('auth')->name('member.store');
});

Route::prefix('members')->middleware(['role:admin','auth'])->group(function () {
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
Route::prefix('simpanan')->middleware(['role:admin','auth'])->group(function () {
    Route::get('/all', [SimpananController::class, 'index'])->middleware(['role:admin','auth'])->name('simpanan.index');
    Route::get('/search', [SimpananController::class, 'search'])->middleware(['role:admin','auth'])->name('simpanan.search');
    Route::get('/add', [SimpananController::class, 'create'])->middleware(['role:admin','auth'])->name('simpanan.create');
    Route::post('/store', [SimpananController::class, 'store'])->middleware(['role:admin','auth'])->name('simpanan.store');
    Route::get('/edit/{id}', [SimpananController::class, 'edit'])->middleware(['role:admin','auth'])->name('simpanan.edit');
    Route::put('/update/{id}', [SimpananController::class, 'update'])->middleware(['role:admin','auth'])->name('simpanan.update');
    Route::put('/status/{id}', [SimpananController::class, 'status'])->middleware(['role:admin','auth'])->name('simpanan.status');
    Route::get('/detail/{id}', [SimpananController::class, 'show'])->middleware(['role:admin','auth'])->name('simpanan.show');
    Route::post('/delete/{id}', [SimpananController::class, 'delete'])->middleware(['role:admin','auth'])->name('simpanan.delete');
    Route::get('/download/{id}', [SimpananController::class, 'downloadPdf'])->name('simpanan.download');
});
Route::prefix('pinjaman')->group(function () {
    Route::get('/search', [PinjamanController::class, 'search'])->middleware(['role:admin','auth'])->name('pinjaman.search');
    Route::get('/all', [PinjamanController::class, 'index'])->middleware(['role:admin','auth'])->name('pinjaman.index');
    Route::get('/add', [PinjamanController::class, 'create'])->middleware('auth')->name('pinjaman.create');
    Route::post('/store', [PinjamanController::class, 'store'])->name('pinjaman.store');
    Route::get('/edit/{id}', [PinjamanController::class, 'edit'])->name('pinjaman.edit');
    Route::put('/update/{id}', [PinjamanController::class, 'update'])->name('pinjaman.update');
    Route::get('/detail/{id}', [PinjamanController::class, 'show'])->name('pinjaman.show');
    Route::put('/approve/{id}', [PinjamanController::class, 'approve'])->middleware(['role:admin','auth'])->name('pinjaman.approve');
    Route::put('/reject/{id}', [PinjamanController::class, 'reject'])->middleware(['role:admin','auth'])->name('pinjaman.reject');
    Route::post('/delete/{id}', [PinjamanController::class, 'delete'])->middleware(['role:admin','auth'])->name('pinjaman.delete');
    Route::get('/download/{id}', [PinjamanController::class, 'printPinjamanPdf'])->name('pinjaman.download');
});
Route::prefix('angsuran')->group(function () {
    Route::get('/search', [AngsuranController::class, 'search'])->name('angsuran.search');
    Route::get('/all', [AngsuranController::class, 'index'])->name('angsuran.index');
    Route::get('/add', [AngsuranController::class, 'create'])->name('angsuran.create');
    Route::post('/store', [AngsuranController::class, 'store'])->name('angsuran.store');
    Route::get('/edit/{id}', [AngsuranController::class, 'edit'])->name('angsuran.edit');
    Route::put('/update', [AngsuranController::class, 'update'])->name('angsuran.update');
    Route::get('/detail/{id}', [AngsuranController::class, 'show'])->name('angsuran.show');
    Route::get('/download/{id}', [AngsuranController::class, 'printAngsuranPdf'])->name('angsuran.download');
});
Route::prefix('akun')->group(function () {
    Route::get('/search', [AkunController::class, 'search'])->middleware(['role:admin','auth'])->name('akun.search');
    Route::get('/all', [AkunController::class, 'index'])->middleware(['role:admin','auth'])->name('akun.index');
    Route::get('/add', [AkunController::class, 'create'])->middleware(['role:admin','auth'])->name('akun.create');
    Route::post('/store', [AkunController::class, 'store'])->name('akun.store');
    Route::get('/edit/{id}', [AkunController::class, 'edit'])->name('akun.edit');
    Route::put('/update/{id}', [AkunController::class, 'update'])->name('akun.update');
    Route::get('/detail/{id}', [AkunController::class, 'show'])->middleware(['role:admin','auth'])->name('akun.show');
    Route::post('/delete/{id}', [AkunController::class, 'delete'])->middleware(['role:admin','auth'])->name('akun.delete');

});
Route::prefix('laporan')->middleware(['role:admin','auth'])->group(function () {
    Route::get('/simpanan', [LaporanController::class, 'indexSimpanan'])->name('laporanSimpanan.index');
    Route::get('/pinjaman', [LaporanController::class, 'indexPinjaman'])->name('laporanPinjaman.index');
    Route::get('/shu', [LaporanController::class, 'indexSHU'])->name('laporanSHU.index');
    Route::get('/download-simpanan', [LaporanController::class, 'downloadSimpananPdf'])->name('printSimpanan.index');
    Route::get('/download-pinjaman', [LaporanController::class, 'downloadPinjamanPdf'])->name('printPinjaman.index');
    Route::get('/download-SHU', [LaporanController::class, 'downloadSHUPdf'])->name('printSHU.index');
});


Route::get('/notifications/unread-count', [NotificationController::class, 'getUnreadNotificationsCount'])->name('notifications.unreadCount');
Route::get('/notifications', [NotificationController::class, 'getNotifications'])->name('notifications.list');
Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');



