<?php

use App\Http\Controllers\barangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\detailbeliController;
use App\Http\Controllers\DetailJual;
use App\Http\Controllers\hakAksesController;
use App\Http\Controllers\historyController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\pembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\suplierController;
use App\Livewire\PenjualanBarang;
use App\Models\kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Spatie\Activitylog\Models\Activity;

use function Laravel\Prompts\alert;

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

// Auth
Route::get('/login', [loginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login-proses', [loginController::class, 'store'])->name('login-proses');
Route::post('/logout', [loginController::class, 'logout']);
// End Auth

// Route::get('History', [historyController::class, 'index']);
Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

Route::middleware(['auth','hakAkses:Admin'])->group(function () {

    //================================= ADMIN ==========================================
    // Dashboard

    //----------------------------- DATA MASTER -----------------------------------------

    // Suplier
    Route::get('/suplier', [suplierController::class, 'index'])->name('suplier.index');
    Route::get('/suplier/create', [suplierController::class, 'index'])->name('suplier.create');
    Route::post('/suplier', [suplierController::class, 'store'])->name('suplier.store');
    Route::put('update-s/{id}', [suplierController::class, 'update']);
    Route::get('{id}/destroy-s', [suplierController::class, 'destroy']);
    Route::get('/search', [suplierController::class, 'search'])->name('search.suplier');
    // end Suplier

    // Barang
    Route::get('/barang', [barangController::class, 'index'])->name('barang.index');
    Route::post('/barang', [barangController::class, 'store'])->name('barang.store');
    Route::put('update-b/{id}', [barangController::class, 'update']);
    Route::get('{id}/destroy', [barangController::class, 'destroy']);
    // end Barang

    // Petugas
    Route::get('/petugas', [PetugasController::class, 'index']);
    Route::post('/petugas', [PetugasController::class, 'store'])->name('petugas.store');
    Route::get('/{id}/destroy-p', [PetugasController::class, 'destroy']);
    Route::put('/update-p/{id}', [PetugasController::class, 'update']);
    // end Petugas

    // Kategori
    Route::get('/kategori', [kategoriController::class, 'index']);
    Route::post('/kategori', [kategoriController::class, 'store'])->name('kategori.store');


    // ------------------------------------ END DATA MASTER --------------------------------------

    // ------------------------------------- MENU HAK AKSES --------------------------------------

    Route::get('/hakakses', [hakAksesController::class, 'index']);
    Route::post('/hakakses', [hakAksesController::class, 'store'])->name('hak.store');

    // ----------------------------------- END MENU HAK AKSES ------------------------------------

    // ---------------------------------------- LAPORAN ------------------------------------------

    // Penjualan
    Route::get('LaporanPj', [PenjualanController::class, 'Laporan']);
    Route::post('LaporanPj', [PenjualanController::class, 'LaporanPenjualan'])->name('Laporan.penjualan');
    Route::get('LaporanPd', [PenjualanController::class, 'LaporanPendapatan']);
    Route::post('Laporan', [PenjualanController::class, 'refresh'])->name('Laporan.refresh');
    Route::get('LaporanPd/data/{awal}/{akhir}', [PenjualanController::class, 'data'])->name('Laporan.data');

    // FIlTER DATE
    Route::get('/filter', [PenjualanController::class, 'filter']);
    // CETAK PDF
    Route::get('/cetakPDF', [PenjualanController::class, 'cetakPDF']);

    // Pembelian
    Route::get('LaporanPb', [pembelianController::class, 'Laporan']);
    Route::get('/periode', [pembelianController::class, 'periode']);
    Route::post('/cetak', [pembelianController::class, 'cetak']);


    // ------------------------------------- END Laporan --------------------------------------------

    // ==================================== END ADMIN ===============================================
});

Route::middleware(['auth','hakAkses:Petugas,Admin'])->group(function () {
    // ==================================== PETUGAS =================================================

    // ---------------------------------- PENJUALAN -------------------------------------------------
    // Transaksi Penjualan
    Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan');
    Route::get('/penjualans', [PenjualanController::class, 'create'])->name('create.jual');
    Route::get('/penjualan-detail', [DetailJual::class, 'index']);
    Route::get('/detailJual-barang/{id}/{id2}/{id3}', [DetailJual::class, 'dataB']);
    Route::get('/{id}/destroy-TJ', [PenjualanController::class, 'destroy']);
    Route::post('detail-jual', [PenjualanController::class, 'store'])->name('detail.jual');

    // Struk
    Route::get('/struk', [PenjualanController::class, 'struk']);

    // ----------------------------------- END PENJUALAN --------------------------------------------

    // ----------------------------------- PEMBELIAN ------------------------------------------------
    // Transaksi Pembelian
    Route::get('/pembelian', [pembelianController::class, 'index']);
    Route::get('/pembelian/{id}/create', [pembelianController::class, 'create'])->name('pembelian.create');
    Route::get('/pembelian-detail', [detailbeliController::class, 'index']);
    Route::get('/detail-barang', [detailbeliController::class, 'dataB']);
    Route::get('/{id}/destroy-TS', [detailbeliController::class, 'destroy']);
    Route::post('detail-store', [detailbeliController::class, 'storbarae'])->name('detail.store');
    // Route::post('coba/{id}', [detailbeliController::class, 'update'])->middleware('auth');
    Route::get('/test/{id}/{id1}', [pembelianController::class, 'lihatDetail']);
    // -------------------------------------END PEMBELIAN -------------------------------------------

    // ===================================== END PETUGAS ============================================

});
