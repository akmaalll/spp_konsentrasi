<?php

use App\Http\Controllers\Admin\MahasiswaController;
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
    return view('welcome');
});



Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        return view('pages.admin.index');
    });

    Route::prefix('mahasiswa')->group(function () {
        Route::get('/', [MahasiswaController::class, 'index'])->name('index.mahasiswa');
        Route::get('/detail/{nim}', [MahasiswaController::class, 'show'])->name('show.mahasiswa');
        Route::get('/create', [MahasiswaController::class, 'create'])->name('create.mahasiswa');
        Route::post('/store', [MahasiswaController::class, 'store'])->name('store.mahasiswa');
        Route::get('/edit/{id}', [MahasiswaController::class, 'edit'])->name('edit.mahasiswa');
        Route::put('/update', [MahasiswaController::class, 'update'])->name('update.mahasiswa');
        Route::delete('/delete{id}', [MahasiswaController::class, 'destroy'])->name('destroy.mahasiswa');
    });
});
