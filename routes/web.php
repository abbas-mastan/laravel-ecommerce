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
    Route::get('categories',[AdminController::class,'categories'])->name('categories');
    Route::get('products',[AdminController::class,'products'])->name('products');
    Route::get('add-category/{id?}',[AdminController::class,'addCategory'])->name('add.category');
    Route::get('delete-category/{category}',[AdminController::class,'deleteCategory'])->name('delete.category');
    Route::post('add-category/{id?}',[AdminController::class,'storeCategory'])->name('store.category');
    Route::get('add-product/{id?}',[AdminController::class,'addProduct'])->name('add.product');
    Route::get('delete-product/{product}',[AdminController::class,'deleteProduct'])->name('delete.product');
    Route::post('add-product/{id?}',[AdminController::class,'storeProduct'])->name('store.product');
});

Route::view('/app', 'app');
