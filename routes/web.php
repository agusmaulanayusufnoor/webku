<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UploadbaController;
use App\Http\Controllers\UploadtabController;
use App\Http\Controllers\UploaddepController;
use App\Http\Controllers\UploadkreController;
use App\Http\Controllers\UploadakController;
use App\Http\Controllers\TelegramController;

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


// Route::get('/dashboard', function () {
//     return view('dashboard');
// });
Route::get('/',[LoginController::class,'showLoginForm'])->name('showLoginForm');
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
//Route::post('/setperiode',[DashboardController::class,'setperiode'])->name('setperiode');

Route::post('/sendchat',[TelegramController::class,'sendchat'])->name('sendchat');
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//hanya admin
Route::group(['middleware' => ['auth', 'ceklevel:1']],function () {
    ///route user
    Route::get('/user',[UserController::class,'index'])->name('user');
    Route::get('/user',[UserController::class,'store'])->name('user');
    Route::resource('user', UserController::class);

    //route telegram

});
//admin dan user pelayanan
Route::group(['middleware' => ['auth', 'ceklevel:1,2']],function () {
   //route stock
    Route::get('stock', [StockController::class, 'index']);
    Route::get('/stock',[StockController::class,'store'])->name('stock');
    Route::resource('stock', StockController::class);
    //cari data stock
    Route::get('/search', [StockController::class, 'search'])->name('search');

        //route berita acara kas
   Route::get('/pelayanan/download',[UploadbaController::class,'index'])->name('download');
   Route::get('/pelayanan/uploadba',[UploadbaController::class,'create'])->name('uploadba');
   Route::post('/pelayanan/simpan-file',[UploadbaController::class,'store'])->name('simpan-file');
   Route::delete('/pelayanan/download/{id}',[UploadbaController::class,'destroy'])->name('download');

   //route berita tabungan
  Route::get('/pelayanan/downloadtab',[UploadtabController::class,'index'])->name('downloadtab');
  Route::get('/pelayanan/uploadtab',[UploadtabController::class,'create'])->name('uploadtab');
  Route::post('/pelayanan/simpantab-file',[UploadtabController::class,'store'])->name('simpantab');
  Route::delete('/pelayanan/downloadtab/{id}',[UploadtabController::class,'destroy'])->name('downloadtab');

  //route berita deposito
  Route::get('/pelayanan/downloaddep',[UploaddepController::class,'index'])->name('downloaddep');
  Route::get('/pelayanan/uploaddep',[UploaddepController::class,'create'])->name('uploaddep');
  Route::post('/pelayanan/simpandep-file',[UploaddepController::class,'store'])->name('simpandep-file');
  Route::delete('/pelayanan/downloaddep/{id}',[UploaddepController::class,'destroy'])->name('downloaddep');

});
//admin dan user kredit
Route::group(['middleware' => ['auth', 'ceklevel:1,3']],function () {
   //route kredit
   Route::get('/kredit/download',[UploadkreController::class,'index'])->name('download');
   Route::get('/kredit/uploadkre',[UploadkreController::class,'create'])->name('uploadkre');
   Route::post('/kredit/simpan-file',[UploadkreController::class,'store'])->name('simpan-file');
   Route::delete('/kredit/download/{id}',[UploadkreController::class,'destroy'])->name('download');
 });

 //admin dan user akunting
Route::group(['middleware' => ['auth', 'ceklevel:1,4']],function () {
    //route akunting
    Route::get('/akunting/download',[UploadakController::class,'index'])->name('download');
    Route::get('/akunting/uploadak',[UploadakController::class,'create'])->name('uploadkre');
    Route::post('/akunting/simpan-file',[UploadakController::class,'store'])->name('simpan-file');
    Route::delete('/akunting/download/{id}',[UploadakController::class,'destroy'])->name('download');
  });
