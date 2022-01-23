<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\AjaxController;
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
 //Route::get('/stock',[StockController::class,'index'])->name('stock');
 Route::get('stock', [StockController::class, 'index']);
 Route::get('/stock',[StockController::class,'store'])->name('stock');
 Route::get('/fetch_data',[StockController::class,'fetch_data'])->name('fetch_data');

//cari data stock
Route::get('/search', [StockController::class, 'search'])->name('search');

//route::get('/stock/fetch_data', [StockController::class,'fetch_data']);
Route::post('/stock/add_data', [StockController::class,'add_data'])->name('stock.add_data');
Route::post('/stock/update_data', [StockController::class,'update_data'])->name('stock.update_data');
Route::post('/stock/delete_data', [StockController::class,'delete_data'])->name('stock.delete_data');

 Route::resource('stock', StockController::class);
