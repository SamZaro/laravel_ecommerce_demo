<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth','Admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    //Categories
    Route::resource('categories', CategoryController::class)->except(['show']);

    //Products
    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/create', [ProductController::class, 'create']);
    Route::post('products/store', [ProductController::class, 'store']);
    Route::get('products/edit/{id}', [ProductController::class, 'edit']);
    Route::put('products/update/{id}', [ProductController::class, 'update']);
    Route::delete('products/destroy/{id}', [ProductController::class, 'destroy']);

    //Users
    Route::get('users', [DashboardController::class, 'users']);
    Route::get('/users/{id}', [DashboardController::class, 'show'])->name('admin.users.show');
});


Route::middleware(['auth'])->group(function () {
    Route::get('account', [DashboardController::class, 'account'])->name('auth.account');

    Route::get('cart', [CartController::class,'viewcart']);
    Route::post('delete-cart-item', [CartController::class, 'deleteProduct']);
    Route::post('update-cart', [CartController::class, 'updatecart']);
});



Route::get('/', [FrontendController::class, 'index'])->name('index');

//Categories Frontend
Route::get('category', [FrontendController::class, 'category']);
Route::get('/category/{slug}/', [FrontendController::class, 'viewcategory']);
Route::get('/category/{cate_slug}/{prod_slug}', [FrontendController::class, 'productview']);

//Cart
Route::post('add-to-cart', [CartController::class, 'addProduct']);

//Cart-counter in Navmenu
Route::get('load-cart-data', [CartController::class,'cartcount']);

//Pages Frontend
Route::get('about', [PagesController::class, 'about']);
