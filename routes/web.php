<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OpinionController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AttributeController;

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
require __DIR__.'/auth.php';

Route::get('/',[AdminController::class,'index']);
Route::redirect('/','/admin/dashboard');
Route::group(['middleware' => ['auth'],'prefix' => 'admin','as'=>'admin.'], function () {
    Route::get('dashboard',[AdminController::class,'index'])->name('dashboard');
    Route::get('categories',[AdminController::class,'categories'])->name('categories');
    Route::get('products',[AdminController::class,'products'])->name('products');
    Route::get('add-category/{id?}',[AdminController::class,'addCategory'])->name('add.category');
    Route::get('delete-category/{category}',[AdminController::class,'deleteCategory'])->name('delete.category');
    Route::post('add-category/{id?}',[AdminController::class,'storeCategory'])->name('store.category');
    Route::get('add-product/{id?}',[AdminController::class,'addProduct'])->name('add.product');
    Route::get('delete-product/{product}',[AdminController::class,'deleteProduct'])->name('delete.product');
    Route::post('add-product/{id?}',[AdminController::class,'storeProduct'])->name('store.product');
    // units routes starts here
    Route::get('add-unit/{id?}',[UnitController::class,'createUnit'])->name('add.unit');
    Route::post('store-unit/{id?}',[UnitController::class,'storeUnit'])->name('store.unit');
    Route::get('units',[UnitController::class,'unitIndex'])->name('units');
    Route::get('delete-unit/{unit}',[UnitController::class,'destroy'])->name('delete.unit');
    //attributes routes starts here
    Route::get('add-attribute/{id?}',[AttributeController::class,'createAttribute'])->name('add.attribute');
    Route::post('store-attribute/{id?}',[AttributeController::class,'storeAttribute'])->name('store.attribute');
    Route::get('attributes',[AttributeController::class,'attributeIndex'])->name('attributes');
    Route::get('delete-attribute/{attribute}',[AttributeController::class,'destroyAttribute'])->name('delete.attribute');
    //opinions routes starts here
    Route::get('add-opinion/{id?}',[OpinionController::class,'createOpinion'])->name('add.opinion');
    Route::post('store-opinion/{id?}',[OpinionController::class,'storeOpinion'])->name('store.opinion');
    Route::get('opinions',[OpinionController::class,'indexOpinion'])->name('opinions');
    Route::get('delete-opinion/{opinion}',[OpinionController::class,'destroyOpinion'])->name('delete.opinion');
});
