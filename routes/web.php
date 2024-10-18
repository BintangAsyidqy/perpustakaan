<?php

use App\Http\Controllers\PerpustakaanController;
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
