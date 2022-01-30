<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UploadbaController;
use App\Http\Controllers\UploadkreController;
use App\Http\Controllers\AjaxController;
use Yajra\DataTables\DataTables;
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
 //Route::get('/fetch_data',[StockController::class,'fetch_data'])->name('fetch_data');
 Route::resource('stock', StockController::class);
//cari data stock
Route::get('/search', [StockController::class, 'search'])->name('search');

 //route pelayanan
 Route::get('/pelayanan/download',[UploadbaController::class,'index'])->name('download');
 Route::get('/pelayanan/uploadba',[UploadbaController::class,'create'])->name('uploadba');
 Route::post('/pelayanan/simpan-file',[UploadbaController::class,'store'])->name('simpan-file');
 Route::delete('/pelayanan/download/{id}',[UploadbaController::class,'destroy'])->name('download');

  //route kredit
  Route::get('/kredit/download',[UploadkreController::class,'index'])->name('download');
  Route::get('/kredit/uploadkre',[UploadkreController::class,'create'])->name('uploadkre');
  Route::post('/kredit/simpan-file',[UploadkreController::class,'store'])->name('simpan-file');
  Route::delete('/kredit/download/{id}',[UploadkreController::class,'destroy'])->name('download');