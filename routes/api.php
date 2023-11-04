<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CartController;
use App\Http\Controllers\api\FoodController;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login',[AuthController::class,'login'])->name('login');
Route::post('register',[AuthController::class,'register'])->name('register');
Route::apiResource('addresses',UserController::class);
Route::get('restaurants',[RestaurantController::class,'index'])->name('restaurants.index');
Route::get('restaurants/{restaurant}',[RestaurantController::class,'show'])->name('restaurants.show');
Route::get('restaurants/{restaurant}/food',[FoodController::class,'index'])->name('food.index');
Route::apiResource('carts',CartController::class);
Route::get('comments',[\App\Http\Controllers\api\CommentController::class,'index'])->name('comments.index');
Route::post('comments',[\App\Http\Controllers\api\CommentController::class,'store'])->name('comments.store');
