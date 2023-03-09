<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\DishController;

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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/directto', [App\Http\Controllers\HomeController::class, 'common'])->name('directto');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin-')->group(function () {
    Route::get('/index', [HomeController::class, 'index'])->name('welcome')->middleware('roles:A');
    Route::get('/add-restaurant', [RestaurantController::class, 'create'])->name('create')->middleware('roles:A');
    Route::post('/storing-in', [RestaurantController::class, 'store'])->name('store')->middleware('roles:A');
    Route::get('/edit/restaurant{restaurant}', [RestaurantController::class, 'edit'])->name('edit')->middleware('roles:A');
    Route::put('/update/restaurant{restaurant}', [RestaurantController::class, 'update'])->name('update')->middleware('roles:A');
    Route::delete('/delete-restaurant{restaurant}', [RestaurantController::class, 'destroy'])->name('delete')->middleware('roles:A');
    Route::get('/add-dish', [DishController::class, 'create'])->name('dish-create')->middleware('roles:A');
    Route::post('/storing-in/dish', [DishController::class, 'store'])->name('dish-store')->middleware('roles:A');
    Route::get('/edit/dish{dish}', [DishController::class, 'edit'])->name('dish-edit')->middleware('roles:A');
    Route::put('/update/dish{dish}', [DishController::class, 'update'])->name('dish-update')->middleware('roles:A');
    Route::delete('/delete-dish{dish}', [DishController::class, 'destroy'])->name('dish-delete')->middleware('roles:A');
    Route::get('/restaurant-menu{restaurant}', [DishController::class, 'show'])->name('restaurant-menu')->middleware('roles:A');
});
Route::prefix('user')->name('user-')->group(function () {
    Route::get('/index/guest', [HomeController::class, 'guestindex'])->name('welcome')->middleware('roles:U');
    Route::get('/restaurant-menu/guest{restaurant}', [HomeController::class, 'show'])->name('restaurant-menu-guest')->middleware('roles:U');
});
