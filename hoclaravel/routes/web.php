<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Response;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/san-pham',[HomeController::class,'products'])->name('product');

Route::get('/them-san-pham',[HomeController::class,'getAdd']);

//Route::post('/them-san-pham',[HomeController::class,'postAdd']);

Route::put('/them-san-pham',[HomeController::class,'putAdd']);

Route::get('lay-thong-tin',[HomeController::class,'getArr']);


Route::get('demo-response',function (){
    //return view('clients.demo-test');

    $response = response()
    ->view('clients.demo-test',[
        'title'=>'Học HTTP Response'
    ],201)
    ->header('Content-Type','application/json')
    ->header('API-Key','123456');

    return $response;
   
});


