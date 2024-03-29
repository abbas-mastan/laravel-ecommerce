<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\BenefitController;
use App\Http\Controllers\Admin\OpinionController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\VariationController;

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
    Route::get('products',[AdminController::class,'products'])->name('products');
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
    //benfits routes starts here
    Route::get('benefits',[BenefitController::class,'indexBenefit'])->name('benefits');
    Route::get('add-benefit/{id?}',[BenefitController::class,'createBenefit'])->name('add.benefit');
    Route::post('store-benefit/{id?}',[BenefitController::class,'storeBenefit'])->name('store.benefit');
    Route::get('delete-benefit/{benefit}',[BenefitController::class,'destroyBenefit'])->name('delete.benefit');
    //variation routes starts here
    Route::get('variations',[VariationController::class,'indexVariation'])->name('variations');
    Route::get('add-variation/{id?}',[VariationController::class,'createVariation'])->name('add.variation');
    Route::post('store-variation/{id?}',[VariationController::class,'storeVariation'])->name('store.variation');
    Route::get('delete-variation/{variation}',[VariationController::class,'destroyVariation'])->name('delete.variation');
    //brands routes starts here
    Route::get('brands',[BrandController::class,'indexBrand'])->name('brands');
    Route::get('add-brand/{id?}',[BrandController::class,'createBrand'])->name('add.brand');
    Route::post('store-brand/{id?}',[BrandController::class,'storeBrand'])->name('store.brand');
    Route::get('delete-brand/{brand}',[BrandController::class,'destroyBrand'])->name('delete.brand');
    //categories routes starts here
    Route::get('categories',[CategoryController::class,'categories'])->name('categories');
    Route::get('add-category/{id?}',[CategoryController::class,'addCategory'])->name('add.category');
    Route::get('delete-category/{category}',[CategoryController::class,'deleteCategory'])->name('delete.category');
    Route::post('add-category/{id?}',[CategoryController::class,'storeCategory'])->name('store.category');

});
