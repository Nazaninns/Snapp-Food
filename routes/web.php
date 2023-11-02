<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\RestaurantCategoryController;
use App\Http\Controllers\SellerController;
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
Route::middleware('auth')->get('logout',[AuthController::class,'logout'])->name('logout');

//admin
Route::middleware('auth')->middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard',AdminController::class)->name('dashboard');
    Route::resource('food_category', FoodCategoryController::class);
    Route::resource('restaurant_category', RestaurantCategoryController::class);
    Route::get('offer', [OffersController::class, 'index'])->name('offer.index');
    Route::get('offer/create', [OffersController::class, 'create'])->name('offer.create');
    Route::post('offer/create', [OffersController::class, 'store'])->name('offer.store');
    Route::delete('offer/delete/{offer}', [OffersController::class, 'delete'])->name('offer.delete');
});

//seller
Route::middleware('auth')->middleware('role:seller')->prefix('seller')->group(function (){
    Route::get('dashboard',[\App\Http\Controllers\SellerController::class,'dashboard'])->name('seller.dashboard');
    Route::get('profile',[\App\Http\Controllers\SellerController::class,'restaurantProfile'])->name('seller.profile');
    Route::post('profile',[\App\Http\Controllers\SellerController::class,'profileStore'])->name('seller.storeProfile');
    Route::get('setting',[\App\Http\Controllers\SellerController::class,'restaurantSetting'])->name('seller.setting');
    Route::post('setting/{restaurant}',[\App\Http\Controllers\SellerController::class,'updateSetting'])->name('seller.updateSetting');
    Route::resource('food',\App\Http\Controllers\FoodController::class);
    // Route::post('food/{food}/party',[\App\Http\Controllers\FoodController::class,'partyStore'])->name('food.party.submit');
});
