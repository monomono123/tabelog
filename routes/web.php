<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReservationController;

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
    return to_route('restaurants.index');
});

Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::controller(UserController::class)->group(function () {
    Route::get('users/mypage', 'mypage')->name('mypage');
    Route::get('users/mypage/egit', 'edit')->name('mypage.edit');
    Route::put('users/mypage', 'update')->name('mypage.update');
    Route::get('users/mypage/password/edit', 'edit_password')->name('mypage.edit_password');
    Route::put('users/mypage/password', 'update_password')->name('mypage.update_password');
    Route::get('users/mypage/reservations', 'reservations')->name('mypage.reservations');
    Route::delete('users/mypage/delete', 'destroy')->name('mypage.destroy');
    Route::get('users/mypage/register_card', 'register_card')->name('mypage.register_card');
    Route::post('users/mypage/token', 'token')->name('mypage.token');
});

Route::get('restaurants/{restaurant}/favorite', [RestaurantController::class, 'favorite'])->name('restaurants.favorite');
Auth::routes(['verify' => true]);
Route::resource('restaurants', RestaurantController::class);
Route::resource('reservations', ReservationController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
