<?php

use App\Http\Controllers\PerpustakaanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KunjunganController;

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

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('/perpustakaan')->name('perpustakaan.')->group(function () {
   Route::get('/tambah', [PerpustakaanController::class, 'create'])->name('tambah');
   Route::get('/data', [PerpustakaanController::class, 'data'])->name('data');
   Route::post('/store', [PerpustakaanController::class, 'store'])->name('store');
   Route::get('/edit/{id}', [PerpustakaanController::class, 'edit'])->name('edit');
   Route::patch('/update/{id}', [PerpustakaanController::class, 'update'])->name('update');
   Route::delete('/delete/{id}', [PerpustakaanController::class, 'destroy'])->name('delete');
   

});

// Route::prefix('/kunjungan')->name('kunjungan.')->group(function () {
//     Route::get('/kunjungan', [KunjunganController::class, 'index'])->name('kunjungan.index');
//     Route::get('/kunjungan/tambah', [KunjunganController::class, 'create'])->name('kunjungan.tambah');
//     Route::post('/kunjungan', [KunjunganController::class, 'store'])->name('kunjungan.store');
    
// });

