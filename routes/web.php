<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [HomeController::class,'index'])->name('homepage');


Route::get('/produk/{id}',[ProductController::class,'show']);
Route::get('/produk',[ProductController::class,'index'])->name('produklist');
Route::resource('review', ReviewController::class);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/cart', [CartController::class,'index']);
Route::get('/cart/add', [CartController::class,'create']);
Route::any('/cart/detail', [CartController::class,'detail'])->name('cart.detail');
Route::post('/cart/store', [CartController::class,'store']);
Route::delete('/cart/{id}', [CartController::class,'destroy']);
Route::get('/cart/{id}/edit', [CartController::class,'edit']);
Route::post('/cart/update', [CartController::class,'update']);
Route::get('/cart/checkout', [CartController::class,'checkout']);
Route::post('/cart/confirm', [CartController::class,'confirm']);
Route::get('/cart/{id}', [CartController::class,'save']);
});



Auth::routes();
Route::get('/profile/{user_id}', [ProfileController::class,'show']);
Route::get('/profile/{user_id}/edit', [ProfileController::class,'edit']);
Route::put('/profile/{user_id}', [ProfileController::class,'update']);


Route::group(['middleware' => ['is_admin']], function () {
   
    Route::get('/order', [OrderController::class,'index']);
    Route::get('/dashboard', [DashboardController::class,'index']);
    Route::post('/dashboard', [DashboardController::class,'store']);
    Route::get('/dashboard/create',[DashboardController::class,'create']);
  
    Route::patch('/dashboard/{dashboard}', [DashboardController::class,'update']);
    Route::get('/dashboard/{dashboard}',[DashboardController::class,'show']);
    Route::get('/dashboard/{dashboard}/edit',[DashboardController::class,'edit']);
    Route::delete('/dashboard/{dashboard}', [DashboardController::class,'destroy']);
    Route::resource('kategori', CategoryController::class);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
