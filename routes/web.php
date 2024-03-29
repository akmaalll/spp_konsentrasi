<?php

use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Auth\AuthController;
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



Route::group(['prefix' => '', 'namespace' => 'App\Http\Controllers\admin', 'middleware' => 'auth:mahasiswa,web'], function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', 'HomeController@index')->name('dashboard');

        Route::prefix('mahasiswa')->group(function () {
            Route::get('/', 'MahasiswaController@index')->name('index.mahasiswa');
            Route::get('/detail/{nim}', 'MahasiswaController@show')->name('show.mahasiswa');
            Route::get('/create', 'MahasiswaController@create')->name('create.mahasiswa');
            Route::post('/store', 'MahasiswaController@store')->name('store.mahasiswa');
            Route::get('/edit/{id}', 'MahasiswaController@edit')->name('edit.mahasiswa');
            Route::put('/update', 'MahasiswaController@update')->name('update.mahasiswa');
            Route::delete('/delete{id}', 'MahasiswaController@destroy')->name('destroy.mahasiswa');
        });
    });
});
