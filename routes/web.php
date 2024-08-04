<?php

use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\CategoryController;
use App\Models\Product;
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

// Route::get('/', function () {
//     return view('admins.layouts.master');
// });
Route::get('/', function () {
    $products = Product::query()->latest('id')->with('category')->limit(30)->get();
    return view('users.layouts.app',compact('products'));
})->name('welcome');

//home
Route::get('home', [HomeController::class, 'index'])
->name('home');

//
Route::get('auth/login', [LoginController::class, 'index'])
->name('login');
Route::post('auth/login', [LoginController::class, 'login'])
->name('login');
Route::post('auth/logout', [LoginController::class, 'logout'])
    ->name('logout')
    ->middleware('web');
// khai báo email
Route::get('auth/verify/{token}', [LoginController::class, 'verify'])
->name('verify');

//khai báo register.
Route::get('auth/register', [RegisterController::class, 'index'])
->name('register');
Route::post('auth/register', [RegisterController::class, 'register'])
->name('register');

// //banner
// Route::get('/banner', [BannerController::class, 'index'])->name('home');



// Chi tiết sản phẩm
// Route::get('products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('product/{slug}' ,[ProductController::class, 'detail'])->name('product.detail');

//danh mục
// Route để lấy danh sách danh mục
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

// Route để hiển thị sản phẩm theo danh mục
// web.php
Route::get('/category/{slug}', [ProductController::class, 'show'])->name('category.show');


// mua hàng
Route::post('cart/add', [\App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::get('cart/list', [\App\Http\Controllers\CartController::class, 'list'])->name('cart.list');
Route::get('cart/buyNow', [\App\Http\Controllers\CartController::class, 'buyNow'])->name('cart.buyNow');
Route::post('order/add', [\App\Http\Controllers\OrderController::class, 'add'])->name('order.add');
Route::get('order/list', [\App\Http\Controllers\OrderController::class, 'list'])->name('order.list');
