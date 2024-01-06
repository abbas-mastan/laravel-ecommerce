<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group([/*'middleware' => ['auth', 'admin'],*/ 'prefix' => 'admin','as'=>'admin.'], function () {
    Route::get('dashboard',[AdminController::class,'index'])->name('dashboard');
    Route::get('brands',[AdminController::class,'brands'])->name('brands');
    Route::get('products',[AdminController::class,'products'])->name('products');
    Route::get('add-product/{id?}',[AdminController::class,'addProduct'])->name('add.product');
    Route::post('add-product/{id?}',[AdminController::class,'storeProduct'])->name('store.product');
});

Route::view('/app', 'app');
