<?php

use App\Http\Controllers\api\AddressController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CartController;
use App\Http\Controllers\api\CommentController;
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

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware(['auth:sanctum', 'role:customer'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
//user
    Route::apiResource('addresses', AddressController::class);
    Route::post('addresses/{address}', [AddressController::class, 'current']);
    Route::patch('user',[AuthController::class,'update']);
//restaurants
    Route::controller(RestaurantController::class)->prefix('restaurants')->group(function () {
        Route::get('/', 'index');
        Route::get('/{restaurant}', 'show');
    });

//food
    Route::get('restaurants/{restaurant}/food', [FoodController::class, 'index']);
//carts

    Route::controller(CartController::class)->prefix('carts')->group(function () {
        Route::get('/', 'index');
        Route::post('/add', 'add');
        Route::patch('/add', 'update');
        Route::get('/{cart}', 'info');
        Route::post('/{cart}/pay', 'pay');
    });
//comments
    Route::controller(CommentController::class)->prefix('comments')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
    });

});

//Route::get('test',function (){
//    throw new \App\Exceptions\MyException();
//});
