<?php

use App\Http\Controllers\FrontEnd\AboutController;
use App\Http\Controllers\FrontEnd\AdditionController;
use App\Http\Controllers\FrontEnd\CategoryController;
use App\Http\Controllers\FrontEnd\CommentController;
use App\Http\Controllers\FrontEnd\ContactController;
use App\Http\Controllers\FrontEnd\FavoriteController;
use App\Http\Controllers\FrontEnd\FrontendController;
use App\Http\Controllers\FrontEnd\OrderController;
use App\Http\Controllers\FrontEnd\ProductController;
use App\Http\Controllers\FrontEnd\ServiceController;
use App\Http\Controllers\FrontEnd\SubCategoryController;
use App\Http\Controllers\FrontEnd\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [FrontendController::class, 'index'])->name('front.index');
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/subcategory/{id}', [SubCategoryController::class, 'show'])->name('subcategory.show');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/addition', [AdditionController::class, 'index'])->name('addition.index');
Route::get('/addition/{id}', [AdditionController::class, 'show'])->name('addition.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
Route::get('/Product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/favorite',[UserController::class,'favorite'])->name('user.favorite')->middleware('auth');
Route::get('/order',[UserController::class,'order'])->name('user.order')->middleware('auth');
Route::get('/profil',[UserController::class,'show'])->name('user.show')->middleware('auth');
Route::get('/profil/edit/{id}',[UserController::class,'edit'])->name('user.edit')->middleware('auth');
Route::post('/profil/update/{id}',[UserController::class,'update'])->name('user.update')->middleware('auth');
Route::delete('/order/{id}',[OrderController::class,'destroy'])->name('order.destroy')->middleware('auth');
Route::delete('/orderAddition/{id}',[OrderController::class,'destroyAddition'])->name('order.destroyAddition')->middleware('auth');
Route::post('/favorite/store',[FavoriteController::class,'store'])->name('favorite.store')->middleware('auth');
Route::post('/comment/store',[CommentController::class,'store'])->name('comment.store')->middleware('auth');
Route::post('/order/store',[OrderController::class,'store'])->name('order.store')->middleware('auth');
Route::post('/orderAddition/store',[OrderController::class,'storeAddition'])->name('order.storeAddition')->middleware('auth');

Route::delete('/favorit/{id}',[FavoriteController::class, 'destroy'])->middleware('auth')->name('favorit.destroy');
Route::get('/new', [FrontendController::class, 'newProduct'])->name('new.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
