<?php

use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Mahasiswa\SppController;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'prosesLogin']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::group(['prefix' => '', 'namespace' => 'App\Http\Controllers\admin', 'middleware' => 'auth:web'], function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', 'HomeController@index')->name('dashboard_admin');

        Route::prefix('mahasiswa')->group(function () {
            Route::get('/', 'MahasiswaController@index')->name('index.mahasiswa');
            Route::get('/detail/{nim}', 'MahasiswaController@show')->name('show.mahasiswa');
            Route::get('/create', 'MahasiswaController@create')->name('create.mahasiswa');
            Route::post('/store', 'MahasiswaController@store')->name('store.mahasiswa');
            Route::get('/edit/{id}', 'MahasiswaController@edit')->name('edit.mahasiswa');
            Route::put('/update', 'MahasiswaController@update')->name('update.mahasiswa');
            Route::delete('/delete{id}', 'MahasiswaController@destroy')->name('destroy.mahasiswa');
        });

        Route::prefix('jurusan')->group(function () {
            Route::get('/', 'JurusanController@index')->name('index.jurusan');
            Route::get('/detail/{nim}', 'JurusanController@show')->name('show.jurusan');
            Route::get('/create', 'JurusanController@create')->name('create.jurusan');
            Route::post('/store', 'JurusanController@store')->name('store.jurusan');
            Route::get('/edit/{id}', 'JurusanController@edit')->name('edit.jurusan');
            Route::put('/update', 'JurusanController@update')->name('update.jurusan');
            Route::delete('/delete{id}', 'JurusanController@destroy')->name('destroy.jurusan');
        });

        Route::prefix('spp')->group(function () {
            Route::get('/', 'SppController@index')->name('index.spp');
            Route::get('/detail/{nim}', 'SppController@show')->name('show.spp');
            Route::get('/create', 'SppController@create')->name('create.spp');
            Route::post('/store', 'SppController@store')->name('store.spp');
            Route::get('/edit/{id}', 'SppController@edit')->name('edit.spp');
            Route::put('/update', 'SppController@update')->name('update.spp');
            Route::delete('/delete{id}', 'SppController@destroy')->name('destroy.spp');
        });

        Route::get('/get-nama-mahasiswa', [PaymentController::class, 'getNamaMahasiswa']);
        Route::get('/get-nama-spp', [PaymentController::class, 'getNamaSpp']);
        Route::get('/transaksi', [PaymentController::class, 'create'])->name('create.payment');
        Route::post('/transaksi/store', [PaymentController::class, 'store'])->name('store.payment');
    });
});

Route::group(['prefix' => '', 'namespace' => 'App\Http\Controllers\mahasiswa', 'middleware' => 'auth:mahasiswa'], function () {

    Route::prefix('mhs')->group(function () {

        Route::get('/', 'HomeController@index')->name('dashboard_mahasiswa');

        Route::prefix('spp')->group(function () {
            Route::get('/', [SppController::class, 'index'])->name('spp.mahasiswa.index');
            Route::get('/checkout', [SppController::class, 'create'])->name('spp.mahasiswa.create');
            Route::post('/store', [SppController::class, 'store'])->name('spp.mahasiswa.store');
        });
    });
});
