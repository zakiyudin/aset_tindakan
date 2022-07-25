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

Auth::routes(['verify' => true]);
// Auth::routes(['verify' => true]);

Route::get('/forgot_password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'forgotPassword'])->name('forgot-password');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
Route::get('/send', [App\Http\Controllers\HomeController::class, 'send'])->name('send');
Route::get('/pass', [App\Http\Controllers\HomeController::class, 'decrypt_pass'])->name('pass');
Route::post('/coba', [App\Http\Controllers\HomeController::class, 'cobaup'])->name('coba-up');

Route::prefix('laporan')->group(function () {
    Route::get('/', [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/export_pdf', [App\Http\Controllers\LaporanController::class, 'export_pdf'])->name('laporan.export_pdf');
    Route::get('/export_csv', [App\Http\Controllers\LaporanController::class, 'export_csv'])->name('laporan.export_csv');
});

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
    Route::get('/{id}/detail', [App\Http\Controllers\TindakanAsetController::class, 'show'])->name('tindakan-aset.detail');
    Route::post('/store', [App\Http\Controllers\TindakanAsetController::class, 'store'])->name('tindakan-aset.store');
    Route::get('/{id}/edit', [App\Http\Controllers\TindakanAsetController::class, 'edit'])->name('tindakan-aset.edit');
    Route::put('/{id}/update', [App\Http\Controllers\TindakanAsetController::class, 'update'])->name('tindakan-aset.update');
    Route::delete('/{id}/delete', [App\Http\Controllers\TindakanAsetController::class, 'destroy'])->name('tindakan-aset.delete');
    Route::post('/import-excel', [App\Http\Controllers\TindakanAsetController::class, 'importExcel'])->name('tindakan-aset.import-excel');
});

Route::prefix('tindakan')->group(function(){
    Route::get('/', [App\Http\Controllers\TindakanController::class, 'index'])->name('tindakan.index');
    Route::get('{di}/edit', [App\Http\Controllers\TindakanController::class, 'edit'])->name('tindakan.edit');
    Route::post('/store', [App\Http\Controllers\TindakanController::class, 'store'])->name('tindakan.store');
});

Route::prefix('asuransi')->middleware(['admin', 'verified'])->group(function(){
    Route::get('/', [App\Http\Controllers\Kendaraan\Master\AsuransiController::class, 'index'])->name('asuransi.index');
    Route::post('/store', [App\Http\Controllers\Kendaraan\Master\AsuransiController::class, 'store'])->name('asuransi.store');
    Route::get('/{id}/edit', [App\Http\Controllers\Kendaraan\Master\AsuransiController::class, 'edit'])->name('asuransi.edit');
    Route::delete('/{id}/delete', [App\Http\Controllers\Kendaraan\Master\AsuransiController::class, 'destroy'])->name('asuransi.delete');
    Route::get('/import', [App\Http\Controllers\Kendaraan\Master\AsuransiController::class, 'import_page'])->name('asuransi.import');
    Route::post('/import_excel', [App\Http\Controllers\Kendaraan\Master\AsuransiController::class, 'importExcel'])->name('asuransi.import-excel');
});

Route::prefix('pemakai_kendaraan')->middleware(['admin', 'verified'])->group(function(){
    Route::get('/', [App\Http\Controllers\Kendaraan\Master\PemakaiKendaraanController::class, 'index'])->name('pemakai_kendaraan.index');
    Route::post('/store', [App\Http\Controllers\Kendaraan\Master\PemakaiKendaraanController::class, 'store'])->name('pemakai_kendaraan.store');
    Route::get('/{id}/edit', [App\Http\Controllers\Kendaraan\Master\PemakaiKendaraanController::class, 'edit'])->name('pemakai_kendaraan.edit');
    Route::delete('/{id}/delete', [App\Http\Controllers\Kendaraan\Master\PemakaiKendaraanController::class, 'destroy'])->name('pemakai_kendaraan.delete');
    Route::get('/import', [App\Http\Controllers\Kendaraan\Master\PemakaiKendaraanController::class, 'import_page'])->name('pemakai_kendaraan.import');
    Route::post('/import_excel', [App\Http\Controllers\Kendaraan\Master\PemakaiKendaraanController::class, 'import'])->name('pemakai_kendaraan.import-excel');
});

Route::prefix('kendaraan')->middleware(['admin', 'verified'])->group(function(){
    Route::get('/', [App\Http\Controllers\Kendaraan\KendaraanController::class, 'index'])->name('kendaraan.index');
    Route::get('/create', [App\Http\Controllers\Kendaraan\KendaraanController::class, 'create'])->name('kendaraan.create');
    Route::post('/store', [App\Http\Controllers\Kendaraan\KendaraanController::class, 'store'])->name('kendaraan.store');
    Route::get('/{id}/edit', [App\Http\Controllers\Kendaraan\KendaraanController::class, 'edit'])->name('kendaraan.edit');
    Route::delete('/{id}/delete', [App\Http\Controllers\Kendaraan\KendaraanController::class, 'destroy'])->name('kendaraan.delete');
    Route::get('/{id}/detail', [App\Http\Controllers\Kendaraan\KendaraanController::class, 'show'])->name('kendaraan.detail');
    Route::get('/pdf', [App\Http\Controllers\Kendaraan\KendaraanController::class, 'download_pdf'])->name('kendaraan.pdf');
    Route::get('/excel', [App\Http\Controllers\Kendaraan\KendaraanController::class, 'export_excel'])->name('kendaraan.excel');
    Route::post('/import-excel', [App\Http\Controllers\Kendaraan\KendaraanController::class, 'import_excel'])->name('kendaraan.import-excel');
    Route::get('/import', [App\Http\Controllers\Kendaraan\KendaraanController::class, 'import_page'])->name('kendaraan.import');
    Route::get('/expired', [App\Http\Controllers\Kendaraan\KendaraanController::class, 'expired'])->name('kendaraan.expired');
    Route::get('/expired_stnk', [App\Http\Controllers\Kendaraan\KendaraanController::class, 'expired_stnk'])->name('kendaraan.expired_stnk');
    Route::get('/expired_pajak_stnk', [App\Http\Controllers\Kendaraan\KendaraanController::class, 'expired_pajak_stnk'])->name('kendaraan.expired_pajak_stnk');
    Route::get('/expired_kir', [App\Http\Controllers\Kendaraan\KendaraanController::class, 'expired_kir'])->name('kendaraan.expired_kir');
    Route::get('/delete_date_null', [App\Http\Controllers\Kendaraan\KendaraanController::class, 'delete_date'])->name('kendaraan.delete_date');

    Route::prefix('kendaraan_expired')->middleware(['admin', 'verified'])->group(function(){
        Route::get('/asuransi_expired', [App\Http\Controllers\Kendaraan\ExpiredController::class, 'asuransi_expired'])->name('kendaraan_expired.asuransi_expired');
        Route::get('/pajak_stnk_expired', [App\Http\Controllers\Kendaraan\ExpiredController::class, 'pajak_stnk_expired'])->name('kendaraan_expired.pajak_stnk_expired');
        Route::get('/stnk_expired', [App\Http\Controllers\Kendaraan\ExpiredController::class, 'stnk_expired'])->name('kendaraan_expired.stnk_expired');
        Route::get('/kir_expired', [App\Http\Controllers\Kendaraan\ExpiredController::class, 'kir_expired'])->name('kendaraan_expired.kir_expired');
        Route::get('/asuransi_expired/update_otomatis', [App\Http\Controllers\Kendaraan\ExpiredController::class, 'update_asuransi_otomatis'])->name('update_asuransi_otomatis');
        Route::post('/pajak_stnk_expired/update_otomatis', [App\Http\Controllers\Kendaraan\ExpiredController::class, 'update_pajak_stnk_otomatis'])->name('update_pajak_stnk_otomatis');
        Route::post('/stnk_expired/update_otomatis', [App\Http\Controllers\Kendaraan\ExpiredController::class, 'update_stnk_otomatis'])->name('update_stnk_otomatis');
        Route::get('/kir_expired/update_otomatis', [App\Http\Controllers\Kendaraan\ExpiredController::class, 'update_kir_otomatis'])->name('update_kir_otomatis');
        Route::get('/detail_asuransi/{id}', [App\Http\Controllers\Kendaraan\ExpiredController::class, 'detail_asuransi'])->name('detail_asuransi');
        Route::get('/detail_pajak_stnk/{id}', [App\Http\Controllers\Kendaraan\ExpiredController::class, 'detail_pajak_stnk'])->name('detail_pajak_stnk');
        Route::get('/detail_stnk/{id}', [App\Http\Controllers\Kendaraan\ExpiredController::class, 'detail_stnk'])->name('detail_stnk');
        Route::get('/detail_kir/{id}', [App\Http\Controllers\Kendaraan\ExpiredController::class, 'detail_kir'])->name('detail_kir');
    });
});

Route::get('/user', [App\Http\Controllers\Kendaraan\Master\UserController::class, 'index'])->name('user.index');

Route::get('/karyawan', function(){
    return view('karyawan.index');
})->name('karyawan')->middleware(['admin', 'verified']);





// Route::prefix('master')->group(function(){
//     Route::get('/', [App\Http\Controllers\Kendaraan\MasterController::class, 'index'])->name('master.index');
    
//     Route::prefix('warna_kendaraan')->group(function(){
//         Route::get('/', [App\Http\Controllers\Kendaraan\WarnaKendaraanController::class, 'index'])->name('warna_kendaraan.index');
//         Route::post('/tambah_warna', [App\Http\Controllers\Kendaraan\WarnaKendaraanController::class, 'store'])->name('warna_kendaraan.store');
//         Route::put('/{id}/update', [App\Http\Controllers\Kendaraan\WarnaKendaraanController::class, 'update'])->name('warna_kendaraan.update');
//         Route::delete('/{id}/delete', [App\Http\Controllers\Kendaraan\WarnaKendaraanController::class, 'destroy'])->name('warna_kendaraan.delete');
//     });
    
//     Route::prefix('tahun_kendaraan')->group(function(){
//         Route::get('/', [App\Http\Controllers\Kendaraan\TahunKendaraanController::class, 'index'])->name('tahun_kendaraan.index');
//         Route::post('/store', [App\Http\Controllers\Kendaraan\TahunKendaraanController::class, 'store'])->name('tahun_kendaraan.store');
//         Route::put('/{id}/update', [App\Http\Controllers\Kendaraan\TahunKendaraanController::class, 'update'])->name('tahun_kendaraan.update');
//         Route::delete('/{id}/delete', [App\Http\Controllers\Kendaraan\TahunKendaraanController::class, 'destroy'])->name('tahun_kendaraan.delete');
//     });
    
//     Route::prefix('jenis_kendaraan')->group(function(){
//         Route::get('/', [App\Http\Controllers\Kendaraan\JenisKendaraanController::class, 'index'])->name('jenis_kendaraan.index');
//         Route::post('/store', [App\Http\Controllers\Kendaraan\JenisKendaraanController::class, 'store'])->name('jenis_kendaraan.store');
//         Route::put('/{id}/update', [App\Http\Controllers\Kendaraan\JenisKendaraanController::class, 'update'])->name('jenis_kendaraan.update');
//         Route::delete('/{id}/delete', [App\Http\Controllers\Kendaraan\JenisKendaraanController::class, 'destroy'])->name('jenis_kendaraan.delete');
//     });
    
//     Route::prefix('/asuransi')->group(function(){
//         Route::get('/', [App\Http\Controllers\Kendaraan\AsuransiController::class, 'index'])->name('asuransi.index');
//         Route::post('/store', [App\Http\Controllers\Kendaraan\AsuransiController::class, 'store'])->name('asuransi.store');
//         Route::put('/{id}/update', [App\Http\Controllers\Kendaraan\AsuransiController::class, 'update'])->name('asuransi.update');
//         Route::delete('/{id}/delete', [App\Http\Controllers\Kendaraan\AsuransiController::class, 'destroy'])->name('asuransi.delete');
//     });
    
//     Route::prefix('/pemakai')->group(function(){
//         Route::get('/', [App\Http\Controllers\Kendaraan\PemakaiController::class, 'index'])->name('pemakai.index');
//         Route::post('/store', [App\Http\Controllers\Kendaraan\PemakaiController::class, 'store'])->name('pemakai.store');
//         Route::put('/{id}/update', [App\Http\Controllers\Kendaraan\PemakaiController::class, 'update'])->name('pemakai.update');
//         Route::delete('/{id}/delete', [App\Http\Controllers\Kendaraan\PemakaiController::class, 'destroy'])->name('pemakai.delete');
//     });
// });





