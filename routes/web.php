<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\RakController;
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

Route::get('/', function () {
    return view('dashboard.index');
});


// Route::get('/daftar-buku', ShowController::class);
Route::resource('/dashboard/rak', RakController::class);
Route::resource('/buku', BukuController::class);
Route::resource('/skripsi', SkripsiController::class);
