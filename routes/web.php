<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\guestController;
use App\Http\Controllers\akunController;
use App\Http\Controllers\bookController;
use App\Http\Controllers\dasboardController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\settingController;
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

Route::get('/', [guestController::class, 'index'])->name('guest')->middleware('guest');
Route::get('/read/{judul}', [guestController::class, 'read'])->name('read-book');

Route::get('/login', [loginController::class, 'index']);
Route::post('/login', [loginController::class, 'login']);
Route::get('/regist', [loginController::class, 'regist']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [dasboardController::class, 'index'])->name('dashboard');

    Route::get('/akun', [akunController::class, 'index'])->name('akun.index');
    Route::post('/akun', [akunController::class, 'store'])->name('akun.add');
    Route::put('/akun/{id}', [akunController::class, 'update'])->name('akun.update');
    Route::delete('/akun/{id}', [akunController::class, 'destroy'])->name('akun.delete');
    
    Route::get('/book', [bookController::class, 'index'])->name('book.index');
    Route::delete('/book/{id}', [bookController::class, 'destroy'])->name('book.delete');
    Route::get('/book/add', [bookController::class, 'add'])->name('book.add');
    Route::post('/book/add', [bookController::class, 'store'])->name('book.store');

    Route::get('/book/detail{id}', [bookController::class, 'detail'])->name('book.detail');
    Route::get('/book/detail/edit{id}', [bookController::class, 'edit'])->name('book.edit');
    Route::put('/book/detail/edit{id}', [bookController::class, 'update'])->name('book.update');

    Route::get('/kategori', [kategoriController::class, 'index'])->name('kategori.index');
    Route::post('/kategori', [kategoriController::class, 'store'])->name('kategori.add');
    Route::delete('/kategori/{id}', [kategoriController::class, 'destroy'])->name('kategori.delete');

    Route::get('/setting/{id}', [settingController::class, 'index'])->name('setting.index');
    Route::put('/setting/{id}', [settingController::class, 'update'])->name('setting.update');

    Route::get('/logout', [loginController::class, 'logout']);
});

require __DIR__.'/auth.php';
