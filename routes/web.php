<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\WifiController;
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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/home', [WifiController::class,'index'])->middleware('auth');
Route::post('/login', [LoginController::class,'authenticate']);
Route::post('/simpan', [WifiController::class,'store']);
Route::post('/edit/{id}', [WifiController::class,'update']);
Route::get('/delete/{id}', [WifiController::class,'destroy']);
