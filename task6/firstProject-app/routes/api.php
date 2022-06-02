<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\api\ProductControler;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('products')->controller(ProductControler::class)->group(function(){

    Route::get('/','index'); //veiw all products
    Route::get('/create','create'); //create new product
    Route::post('/store','store'); 
    Route::get('/edit/{id}','edit'); 
    Route::post('/update/{id}','update'); 
    Route::get('/destroy/{id}','destroy'); 
    

});