<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StockController;
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
    return view('dashboard');
});
//route user
 Route::get('/user',[UserController::class,'index'])->name('user');
 Route::get('/user',[UserController::class,'store'])->name('user');
 Route::resource('user', UserController::class);

 //route stock
 Route::get('/stock',[StockController::class,'index'])->name('stock');
 Route::get('/stock',[StockController::class,'store'])->name('stock');
 Route::resource('stock', StockController::class);
