<?php

use App\Http\Controllers\admin\AdminController;

use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\DiscountController;
use App\Http\Controllers\admin\FoodCategoryController;
use App\Http\Controllers\admin\RestaurantCategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\seller\ArchiveController;
use App\Http\Controllers\admin\ArchiveController as AdminArchiveController;
use App\Http\Controllers\seller\CommentController;
use App\Http\Controllers\admin\CommentController as AdminCommentController;
use App\Http\Controllers\seller\FoodController;
use App\Http\Controllers\seller\FoodPartyController;
use App\Http\Controllers\seller\SellerController;
use App\Http\Controllers\seller\SituationController;
use App\Http\Controllers\seller\TimeController;
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
Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginSubmit')->name('login.submit');
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSubmit')->name('register.submit');
    Route::middleware('auth')->get('logout', 'logout')->name('logout');
});


//admin
Route::middleware('auth')->middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', AdminController::class)->name('dashboard');
    Route::resource('food_category', FoodCategoryController::class);
    Route::resource('restaurant_category', RestaurantCategoryController::class);

    Route::resource('discounts', DiscountController::class)->except('edit', 'update', 'show');

    Route::controller(AdminCommentController::class)->prefix('comment')->name('comments.')->group(function () {
        Route::get('/request', 'commentRequest')->name('request');
        Route::post('/accept/{comment}', 'accept')->name('accept');
        Route::post('/reject/{comment}', 'reject')->name('reject');
    });

    Route::get('archive', [AdminArchiveController::class, 'archive'])->name('archive');
    Route::get('archive/show/{order}', [AdminArchiveController::class, 'show'])->name('archive.show');


    Route::resource('banners', BannerController::class)->except('edit', 'update', 'show');
    //seller
});
Route::middleware('auth')->middleware('role:seller')->prefix('seller')->group(function () {

    Route::controller(SellerController::class)->name('seller.')->group(function () {
        Route::get('dashboard', 'dashboard')->name('dashboard');
        Route::get('profile', 'restaurantProfile')->name('profile');
        Route::post('profile', 'profileStore')->name('storeProfile');
        Route::get('setting', 'restaurantSetting')->name('setting');
        Route::post('setting/{restaurant}', 'updateSetting')->name('updateSetting');
    });

    Route::resource('food', FoodController::class);

    Route::controller(FoodPartyController::class)->name('party.')->group(function () {
        Route::get('party/{food}', 'create')->name('create');
        Route::get('party', 'index')->name('index');
        Route::post('food/{food}/party', 'partyStore')->name('submit');
        Route::get('party/{food}/edit', 'edit')->name('edit');
        Route::post('food/{food}/party/edit', 'partyUpdate')->name('update');
        Route::delete('food/{foodParty}/party', 'delete')->name('delete');
    });

    Route::patch('dashboard/situation/{order}', [SituationController::class, 'changeSituation'])->name('change.situation');

    Route::controller(ArchiveController::class)->prefix('archive')->group(function () {
        Route::get('/', 'archive')->name('archive');
        Route::get('show/{order}', 'show')->name('archive.show');
    });

    Route::controller(CommentController::class)->prefix('comments')->name('comments.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/{comment}', 'reply')->name('reply');
        Route::post('/accept/{comment}', 'accept')->name('accept');
        Route::delete('/delete/{comment}', 'deleteRequest')->name('delete');
    });
    Route::controller(TimeController::class)->prefix('time')->name('time.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::patch('/accept', 'update')->name('update');
        Route::patch('/close', 'close')->name('close');
    });

});

