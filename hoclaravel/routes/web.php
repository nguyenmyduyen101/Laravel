<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;


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

//Client route

Route::get('/',[HomeController::class,'index'])->name('home');

// Route::prefix('categories')->group(function(){

//     //Danh sach chuyen muc
//     Route::get('/',[CategoriesController::class,'index'])->name('categories.list');

//     //Lay chi tiet 1 chuyen muc(Ap dung show form sua chuyen muc)
//     Route::get('/edit{id}',[CategoriesController::class,'getCategory'])->name('categories.edit');

//     //Xu li Update chuyen muc
//     Route::post('/edit{id}',[CategoriesController::class,'updateCategory']);

//     //Hien thi form add du lieu
//     Route::get('/add',[CategoriesController::class,'addCategory'])->name('categories.add');
    

//     //Xu li them chuyen muc
//     Route::post('/add',[CategoriesController::class,'handleAddCategory']);

//     //Xoa chuyen muc
//     Route::delete('/delete{id}',[CategoriesController::class,'deleteCategory'])->name('categories.delete');
    
// });

Route::get('san-pham/{id}',[HomeController::class, 'getProductDetail']);

//Admin route
Route::middleware('auth.admin')->prefix('admin')->group(function(){
    Route::get('/',[DashboardController::class,'index']);
    Route::resource('products',ProductsController::class)->middleware('auth.admin.product');
});