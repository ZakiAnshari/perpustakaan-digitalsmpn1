<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PustakawanController;
use App\Http\Controllers\DashboardpinjamController;
use App\Http\Controllers\PeminjamansiswaController;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });
    //Login
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticating']);
    //Register
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerprocess'])->name('register-store');
    //pinjam siswa
    Route::post('/pinjam/{id}', [PeminjamansiswaController::class, 'store'])->name('pinjam.store');
});

//ADMIN
Route::middleware(['auth'])->group(function () {
    // LOGOUT
    Route::get('/logout', [AuthController::class, 'logout']);
    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index']);
    // DASHBOARD PINJAM
    Route::get('/dashboardpinjam', [DashboardpinjamController::class, 'index'])->name('dashboardpinjam.index');
    Route::get('/dashboardpinjam-show/{id}', [DashboardpinjamController::class, 'show'])->name('dashboardpinjam.show');
    Route::get('/e-book', [DashboardpinjamController::class, 'pinjamebook'])->name('pinjamebook.index');
    Route::get('/ebook/download/{id}', [DashboardpinjamController::class, 'download'])->name('ebook.download');
    Route::post('/logout', [DashboardpinjamController::class, 'logout'])->name('logout');
    // DATA CATEGORY
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/category-add', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category-edit/{id}', [CategoryController::class, 'edit']);
    Route::post('/category-edit/{id}', [CategoryController::class, 'update']);
    Route::get('/category-destroy/{id}', [CategoryController::class, 'destroy']);
    // DATA BUKU
    Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
    Route::post('/book-add', [BukuController::class, 'store'])->name('book.store');
    Route::get('/buku-edit/{id}', [BukuController::class, 'edit']);
    Route::post('/buku-edit/{id}', [BukuController::class, 'update']);
    Route::get('/buku-destroy/{id}', [BukuController::class, 'destroy']);
    Route::get('/buku-show/{id}', [BukuController::class, 'show'])->name('buku.show');
    // DATA PUSTAKAWAN
    Route::get('/pustakawan', [PustakawanController::class, 'index'])->name('pustakawan.index');
    Route::post('/pustakawan-add', [PustakawanController::class, 'store'])->name('pustakawan.store');
    Route::get('/pustakawan-edit/{id}', [PustakawanController::class, 'edit']);
    Route::post('/pustakawan-edit/{id}', [PustakawanController::class, 'update']);
    Route::get('/pustakawan-destroy/{id}', [PustakawanController::class, 'destroy']);
    // DATA ANNGOTA
    Route::get('/anggota', [UserController::class, 'anggota']);
    // DATA EBOOK
    Route::get('/ebook', [EbookController::class, 'index'])->name('ebook.index');
    Route::post('/ebook-add', [EbookController::class, 'store'])->name('ebook.store');
    Route::get('/ebook-edit/{id}', [EbookController::class, 'edit']);
    Route::post('/ebook-edit/{id}', [EbookController::class, 'update']);
    Route::get('/ebook-destroy/{id}', [EbookController::class, 'destroy']);
    Route::get('/ebook-show/{id}', [EbookController::class, 'show'])->name('ebook.show');
    // DATA PEMINJAMAN
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::post('/peminjaman-add', [PeminjamanController::class, 'store'])->name('peminjaman.store');
    Route::get('/peminjaman-edit/{id}', [PeminjamanController::class, 'edit']);
    Route::post('/peminjaman-edit/{id}', [PeminjamanController::class, 'update']);
    Route::get('/peminjaman-destroy/{id}', [PeminjamanController::class, 'destroy']);
    Route::get('/cetak', [PeminjamanController::class, 'cetak']);
    Route::get('/cetak-peminjaman/{id}', [PeminjamanController::class, 'cetakPeminjaman'])->name('cetak.peminjaman');
    Route::get('/cetak-denda/{id}', [PeminjamanController::class, 'cetakDenda'])->name('cetak.denda');
    // USER
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::post('/user-add', [UserController::class, 'store'])->name('user.store');
    Route::get('/user-edit/{id}', [UserController::class, 'edit']);
    Route::post('/user-edit/{id}', [UserController::class, 'update']);
    Route::get('/user-destroy/{id}', [UserController::class, 'destroy']);
    Route::get('/user-show/{id}', [UserController::class, 'show'])->name('user.show');
});
