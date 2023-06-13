<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\SkripsiController;
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

Route::get('/', [ShowController::class, 'index']);
Route::controller(ShowController::class)
    ->prefix('koleksi-buku')
    ->as('koleksiBuku.')
    ->group(function () {
        Route::get('/', 'koleksiBuku')->name('koleksiBuku');
        Route::get('/{id}', 'detailBuku')->name('detailBuku');
    });

Route::controller(ShowController::class)
    ->prefix('daftar-skripsi')
    ->as('daftarSkripsi.')
    ->group(function () {
        Route::get('/', 'daftarSkripsi')->name('daftarSkripsi');
        Route::get('/{id}', 'detailSkripsi')->name('detailSkripsi');
    });

Route::controller(AuthController::class)
    ->prefix('auth')
    ->as('auth.')
    ->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::get('/logout', 'logout')->name('logout');
        Route::get('/callback', 'callback')->name('callback');
    });


Route::middleware('custom-auth')->group(function () {
    Route::prefix('admin')->group(function(){
        Route::get('dashboard',[ShowController::class, 'admin' ]);
        Route::resource('/buku', BukuController::class);
        Route::post('/buku/import', [BukuController::class, 'import'])->name('buku.import');
        Route::resource('/skripsi', SkripsiController::class);
    });
});
