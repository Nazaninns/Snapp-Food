<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\RestaurantCategoryController;
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
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginSubmit'])->name('login.submit');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'registerSubmit'])->name('register.submit');
//admin
Route::prefix('admin')->group(function () {
    Route::resource('food_category', FoodCategoryController::class);
    Route::resource('restaurant_category', RestaurantCategoryController::class);
    Route::get('offer', [OffersController::class, 'index'])->name('offer.index');
    Route::get('offer/create', [OffersController::class, 'create'])->name('offer.create');
    Route::post('offer/create', [OffersController::class, 'store'])->name('offer.store');
    Route::delete('offer/delete', [OffersController::class, 'delete'])->name('offer.delete');
});
