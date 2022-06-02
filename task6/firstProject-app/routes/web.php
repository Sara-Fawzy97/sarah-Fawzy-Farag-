<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\DashboardController;

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
    return view('welcome');
});

// Route::get('/dashboard',function(){
//     return view ('');
// });

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
Route::get('/index',[ProductController::class,'preview'])->name('index');
Route::get('/create',[ProductController::class,'create'])->name('create');
Route::get('/edit/{id}',[ProductController::class,'edit'])->name('edit');
Route::post('/store',[ProductController::class,'store'])->name('store');
Route::post('/destroy/{id}',[ProductController::class,'destroy'])->name('destroy');
Route::post('/update/{id}',[ProductController::class,'update'])->name('update');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
