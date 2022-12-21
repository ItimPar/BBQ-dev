<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

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
    return view('index');
})->name('index');

Route::controller(MainController::class)->group(function () {
    Route::get('/login','login')->name('login');
    Route::post('/login/check','loginCheck')->name('login.check');
    Route::get('/register','register')->name('register');
    Route::post('/register/check','registerCheck')->name('register.check');
    Route::post('/logout','logout')->name('logout');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard','index')->name('dashboard.index');
    Route::get('/dashboard/user','allUser')->name('dashboard.users');
    Route::get('/dashboard/barber','barber')->name('dashboard.barber');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/dashboard/user/create','create')->name('user.create');
    Route::post('/dashboard/user/store','store')->name('user.store');
    Route::get('/dashboard/user/edit/{id}','edit')->name('user.edit');
    Route::post('/dashboard/user/update/{id}','update')->name('user.update');
    Route::get('/dashboard/user/delete/{id}','delete')->name('user.delete');

});

