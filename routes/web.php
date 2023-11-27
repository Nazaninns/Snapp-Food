<?php

use App\Http\Controllers\admin\AdminController;

use App\Http\Controllers\admin\DiscountController;
use App\Http\Controllers\admin\FoodCategoryController;
use App\Http\Controllers\admin\RestaurantCategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\seller\ArchiveController;
use App\Http\Controllers\seller\CommentController;
use App\Http\Controllers\admin\CommentController as AdminCommentController;
use App\Http\Controllers\seller\SituationController;
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
Route::middleware('auth')->get('logout', [AuthController::class, 'logout'])->name('logout');

//admin
Route::middleware('auth')->middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', AdminController::class)->name('dashboard');
    Route::resource('food_category', FoodCategoryController::class);
    Route::resource('restaurant_category', RestaurantCategoryController::class);
    Route::get('discount', [DiscountController::class, 'index'])->name('discount.index');
    Route::get('discount/create', [DiscountController::class, 'create'])->name('discount.create');
    Route::post('discount/create', [DiscountController::class, 'store'])->name('discount.store');
    Route::delete('discount/delete/{discount}', [DiscountController::class, 'delete'])->name('discount.delete');
    Route::get('comment/request', [AdminCommentController::class, 'commentRequest'])->name('comments.request');
    Route::post('comment/accept/{comment}',[AdminCommentController::class,'accept'])->name('comments.accept');
    Route::post('comment/reject/{comment}',[AdminCommentController::class,'reject'])->name('comments.reject');
});

//seller
Route::middleware('auth')->middleware('role:seller')->prefix('seller')->group(function () {
    Route::get('dashboard', [\App\Http\Controllers\seller\SellerController::class, 'dashboard'])->name('seller.dashboard');
    Route::get('profile', [\App\Http\Controllers\seller\SellerController::class, 'restaurantProfile'])->name('seller.profile');
    Route::post('profile', [\App\Http\Controllers\seller\SellerController::class, 'profileStore'])->name('seller.storeProfile');
    Route::get('setting', [\App\Http\Controllers\seller\SellerController::class, 'restaurantSetting'])->name('seller.setting');
    Route::post('setting/{restaurant}', [\App\Http\Controllers\seller\SellerController::class, 'updateSetting'])->name('seller.updateSetting');
    Route::resource('food', \App\Http\Controllers\seller\FoodController::class);


    Route::get('party/{food}', [\App\Http\Controllers\seller\FoodPartyController::class, 'party'])->name('party');
    Route::get('party', [\App\Http\Controllers\seller\FoodPartyController::class, 'index'])->name('party.index');
    Route::post('food/{food}/party', [\App\Http\Controllers\seller\FoodPartyController::class, 'partyStore'])->name('party.submit');
    Route::get('party/{food}/edit', [\App\Http\Controllers\seller\FoodPartyController::class, 'edit'])->name('party.edit');
    Route::post('food/{food}/party/edit', [\App\Http\Controllers\seller\FoodPartyController::class, 'partyUpdate'])->name('party.update');
    Route::delete('food/{foodParty}/party', [\App\Http\Controllers\seller\FoodPartyController::class, 'delete'])->name('party.delete');


    Route::patch('dashboard/situation/{cart}', [SituationController::class, 'changeSituation'])->name('change.situation');

    Route::controller(ArchiveController::class)->prefix('archive')->group(function () {
        Route::get('/', 'archive')->name('archive');
        Route::get('show/{cart}', 'show')->name('archive.show');
        Route::get('date', 'date')->name('date');
    });

    Route::controller(CommentController::class)->prefix('comments')->group(function () {
        Route::get('/', 'index')->name('comments.index');
        Route::post('/{comment}', 'reply')->name('comments.reply');
        Route::post('/accept/{comment}', 'accept')->name('comments.accept');
        Route::post('/delete/{comment}', 'deleteRequest')->name('comments.delete');
    });


});
Route::get('test', function () {
    \Illuminate\Support\Facades\Mail::to('nazanin@gmail.com')->send(new \App\Mail\WelcomeMail());
    return 'email send';
});
