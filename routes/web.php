<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
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
Route::post('/login',[AuthController::class,'login']);
Route::get('/beranda',[BerandaController::class,'index']);
Route::get('/pelanggan',[PelangganController::class,'index']);
Route::get('/pelanggan/add',[PelangganController::class,'create']);
Route::post('/pelanggan/store',[PelangganController::class,'store']);
Route::get('/pelanggan/edit/{id}',[PelangganController::class,'edit']);
Route::post('/pelanggan/updated/{id}',[PelangganController::class,'update']);
Route::delete('/pelanggan/delete/{id}',[PelangganController::class,'destroy']);
Route::get('/user',[UserController::class,'index']);
Route::get('/user/add',[UserController::class,'create']);

Route::get('/logout',[AuthController::class,'logout']);
