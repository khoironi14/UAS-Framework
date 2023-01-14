<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\PelangganController;
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
    return view('login');
});
Route::post('/login',[LoginController::class,'validatation']);
Route::get('/beranda',[BerandaController::class,'index']);
Route::get('/pelanggan',[PelangganController::class,'index']);
Route::get('/pelanggan/add',[PelangganController::class,'create']);
Route::post('/pelanggan/store',[PelangganController::class,'store']);
Route::get('/pelanggan/edit/{id}',[PelangganController::class,'edit']);
Route::post('/pelanggan/updated/{id}',[PelangganController::class,'updated']);
