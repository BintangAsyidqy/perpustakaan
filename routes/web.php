<?php

use App\Http\Controllers\PerpustakaanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\UserController;



Route::get('/', [UserController::class, 'login'])->name('login');
// Route untuk memproses data login (POST)
Route::post('/login', [UserController::class, 'loginAuth'])->name('login.auth');

// Route untuk logout (GET)
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

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

Route::get('/kunjungan', [KunjunganController::class, 'index'])->name('kunjungan.index');
Route::get('/kunjungan/tambah', [KunjunganController::class, 'create'])->name('kunjungan.tambah');
Route::post('/kunjungan', [KunjunganController::class, 'store'])->name('kunjungan.store');
Route::get('/kunjungan/edit/{id}', [KunjunganController::class, 'edit'])->name('kunjungan.edit');
Route::patch('/kunjungan/update/{id}', [KunjunganController::class, 'update'])->name('kunjungan.update');
Route::delete('/kunjungan/delete/{id}', [KunjunganController::class, 'destroy'])->name('kunjungan.delete');
    
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['IsGuru'])->group(function () {
    Route::prefix('/perpustakaan')->name('perpustakaan.')->group(function () {
        Route::get('/tambah', [PerpustakaanController::class, 'create'])->name('tambah');
        Route::get('/data', [PerpustakaanController::class, 'data'])->name('data');
        Route::post('/store', [PerpustakaanController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [PerpustakaanController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [PerpustakaanController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [PerpustakaanController::class, 'destroy'])->name('delete');
     
     });
     Route::get('/orders/data', [PerpustakaanController::class, 'indexAdmin'])->name('orders.data');
     Route::get('/orders/export-excel', [PerpustakaanController::class, 'exportExcel'])->name('orders.export.excel');
     Route::get('/perpustakaan/{id}/download', [PerpustakaanController::class, 'downloadPDF'])->name('perpustakaan.downloadPDF');
     Route::get('kunjungan/data', [KunjunganController::class, 'indexAdmin'])->name('kunjungan.data');
     Route::get('kunjungan/export-excel', [KunjunganController::class, 'exportExcel'])->name('kunjungan.export.excel');
     Route::get('/kunjungan/{id}/pdf', [KunjunganController::class, 'exportPdf'])->name('kunjungan.export.pdf');
});


            
