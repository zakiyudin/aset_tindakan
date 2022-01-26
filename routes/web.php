<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/send', [App\Http\Controllers\HomeController::class, 'send'])->name('send');

Route::prefix('tipe-aset')->group(function () {
    Route::get('/', [App\Http\Controllers\TipeAsetController::class, 'index'])->name('tipe-aset.index');
    Route::get('/create', [App\Http\Controllers\TipeAsetController::class, 'create'])->name('tipe-aset.create');
    Route::post('/store', [App\Http\Controllers\TipeAsetController::class, 'store'])->name('tipe-aset.store');
    Route::get('/{id}/edit', [App\Http\Controllers\TipeAsetController::class, 'edit'])->name('tipe-aset.edit');
    Route::put('/{id}/update', [App\Http\Controllers\TipeAsetController::class, 'update'])->name('tipe-aset.update');
    ROute::delete('/{id}/delete', [App\Http\Controllers\TipeAsetController::class, 'destroy'])->name('tipe-aset.delete');
});

Route::prefix('divisi')->group(function () {
    Route::get('/', [App\Http\Controllers\DivisiController::class, 'index'])->name('divisi.index');
    Route::get('/create', [App\Http\Controllers\DivisiController::class, 'create'])->name('divisi.create');
    Route::post('/store', [App\Http\Controllers\DivisiController::class, 'store'])->name('divisi.store');
    Route::get('/{id}/edit', [App\Http\Controllers\DivisiController::class, 'edit'])->name('divisi.edit');
    Route::put('/{id}/update', [App\Http\Controllers\DivisiController::class, 'update'])->name('divisi.update');
    ROute::delete('/{id}/delete', [App\Http\Controllers\DivisiController::class, 'destroy'])->name('divisi.delete');
});



Route::prefix('tindakan-aset')->group(function () {
    Route::get('/', [App\Http\Controllers\TindakanAsetController::class, 'index'])->name('tindakan-aset.index');
    Route::get('/create', [App\Http\Controllers\TindakanAsetController::class, 'create'])->name('tindakan-aset.create');
    Route::post('/store', [App\Http\Controllers\TindakanAsetController::class, 'store'])->name('tindakan-aset.store');
    Route::get('/{id}/edit', [App\Http\Controllers\TindakanAsetController::class, 'edit'])->name('tindakan-aset.edit');
    Route::put('/{id}/update', [App\Http\Controllers\TindakanAsetController::class, 'update'])->name('tindakan-aset.update');
    ROute::delete('/{id}/delete', [App\Http\Controllers\TindakanAsetController::class, 'destroy'])->name('tindakan-aset.delete');
});
