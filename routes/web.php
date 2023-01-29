<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\PemakaianController;
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
Route::post('/user/store',[UserController::class,'store']);
Route::get('/user/edit/{id}',[UserController::class,'edit']);
Route::post('/user/updated/{id}',[UserController::class,'update']);
Route::delete('/user/delete/{id}',[UserController::class,'destroy']);
Route::get('/tarif',[TarifController::class,'index']);
Route::get('/pemakaian',[PemakaianController::class,'index']);
Route::get('/pemakaian/add',[PemakaianController::class,'create']);
Route::post('/pemakaian/store',[PemakaianController::class,'store']);
Route::get('/logout',[AuthController::class,'logout']);
