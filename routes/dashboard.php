<?php

use App\Http\Controllers\Dashboard\AboutController;
use App\Http\Controllers\Dashboard\AdditionController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ColorController;
use App\Http\Controllers\Dashboard\CommentController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\DashController;
use App\Http\Controllers\Dashboard\MenuController;
use App\Http\Controllers\Dashboard\OrderAdditionController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\SocialController;
use App\Http\Controllers\Dashboard\SubCategoryController;
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
// Auth::routes();
Route::prefix('dash/')->middleware('auth')->group(function () {
    Route::get('/', [DashController::class, 'index'])->name('dash.index');



    Route::resource('menus', MenuController::class);
    Route::get('Softmenus', [MenuController::class, 'recycleBin'])->name('menus.soft');
    Route::get('menu/finldelete/{id}', [MenuController::class, 'finalDelete'])->name('menus.finaldelete');
    Route::get('menu/restore/{id}', [MenuController::class, 'restore'])->name('menus.restore');


    Route::resource('abouts', AboutController::class);
    Route::get('SoftAbouts', [AboutController::class, 'recycleBin'])->name('abouts.soft');
    Route::get('about/finldelete/{id}', [AboutController::class, 'finalDelete'])->name('abouts.finaldelete');
    Route::get('about/restore/{id}', [AboutController::class, 'restore'])->name('abouts.restore');


    Route::resource('contacts', ContactController::class);
    Route::get('Softcontacts', [ContactController::class, 'recycleBin'])->name('contacts.soft');
    Route::get('contact/finldelete/{id}', [ContactController::class, 'finalDelete'])->name('contacts.finaldelete');
    Route::get('contact/restore/{id}', [ContactController::class, 'restore'])->name('contacts.restore');


    Route::resource('services', ServiceController::class);
    Route::get('Softservices', [ServiceController::class, 'recycleBin'])->name('services.soft');
    Route::get('service/finldelete/{id}', [ServiceController::class, 'finalDelete'])->name('services.finaldelete');
    Route::get('service/restore/{id}', [ServiceController::class, 'restore'])->name('services.restore');

    Route::resource('socials', SocialController::class);
    Route::get('Softsocials', [SocialController::class, 'recycleBin'])->name('socials.soft');
    Route::get('social/finldelete/{id}', [SocialController::class, 'finalDelete'])->name('socials.finaldelete');
    Route::get('social/restore/{id}', [SocialController::class, 'restore'])->name('socials.restore');



    Route::resource('categories', CategoryController::class);
    Route::get('Softcategories', [CategoryController::class, 'recycleBin'])->name('categories.soft');
    Route::get('category/finldelete/{id}', [CategoryController::class, 'finalDelete'])->name('categories.finaldelete');
    Route::get('category/restore/{id}', [CategoryController::class, 'restore'])->name('categories.restore');



    Route::resource('sub_categories', SubCategoryController::class);
    Route::get('Softsub_categories', [SubCategoryController::class, 'recycleBin'])->name('sub_categories.soft');
    Route::get('sub_category/finldelete/{id}', [SubCategoryController::class, 'finalDelete'])->name('sub_categories.finaldelete');
    Route::get('sub_category/restore/{id}', [SubCategoryController::class, 'restore'])->name('sub_categories.restore');

    Route::resource('additions', AdditionController::class);
    Route::get('Softadditions', [AdditionController::class, 'recycleBin'])->name('additions.soft');
    Route::get('addition/finldelete/{id}', [AdditionController::class, 'finalDelete'])->name('additions.finaldelete');
    Route::get('addition/restore/{id}', [AdditionController::class, 'restore'])->name('additions.restore');

    Route::resource('colors', ColorController::class);
    Route::get('Softcolors', [ColorController::class, 'recycleBin'])->name('colors.soft');
    Route::get('color/finldelete/{id}', [ColorController::class, 'finalDelete'])->name('colors.finaldelete');
    Route::get('color/restore/{id}', [ColorController::class, 'restore'])->name('colors.restore');

    Route::resource('products', ProductController::class);
    Route::get('Softproducts', [ProductController::class, 'recycleBin'])->name('products.soft');
    Route::get('product/finldelete/{id}', [ProductController::class, 'finalDelete'])->name('products.finaldelete');
    Route::get('product/restore/{id}', [ProductController::class, 'restore'])->name('products.restore');

    Route::resource('orders', OrderController::class);
    Route::resource('order_additions', OrderAdditionController::class);

    Route::resource('comments', CommentController::class);
    Route::get('Softcomments', [CommentController::class, 'recycleBin'])->name('comments.soft');
    Route::get('comment/finldelete/{id}', [CommentController::class, 'finalDelete'])->name('comments.finaldelete');
    Route::get('comment/restore/{id}', [CommentController::class, 'restore'])->name('comments.restore');


});
