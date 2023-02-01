<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarberController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\JobtableController;

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
    Route::get('/dashboard/user','user')->name('dashboard.users');
    Route::get('/dashboard/barber','barber')->name('dashboard.barber');
    Route::get('/dashboard/queue','queue')->name('dashboard.queue');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/dashboard/user/create','create')->name('user.create');
    Route::post('/dashboard/user/store','store')->name('user.store');
    Route::get('/dashboard/user/edit/{id}','edit')->name('user.edit');
    Route::post('/dashboard/user/update/{id}','update')->name('user.update');
    Route::get('/dashboard/user/delete/{id}','delete')->name('user.delete');
    Route::get('/dashboard/user/queue/','userQueue')->name('user.queue');
    Route::get('/dashboard/user/queue/history/{scope?}','userQueueHistory')->name('user.queueHistory');
    Route::get('/dashboard/user/profile','userProfile')->name('user.profile');
});

Route::controller(BarberController::class)->group(function () {
    Route::get('/dashboard/barber/create','create')->name('barber.create');
    Route::post('/dashboard/barber/store','store')->name('barber.store');
    Route::get('/dashboard/barber/edit/{id}','edit')->name('barber.edit');
    Route::post('/dashboard/barber/update/{id}','update')->name('barber.update');
    Route::get('/dashboard/barber/delete/{id}','delete')->name('barber.delete');
});

Route::controller(QueueController::class)->group(function () {
    Route::get('/dashboard/queue/create','create')->name('queue.create');
    Route::post('/dashboard/queue/store','store')->name('queue.store');
    Route::get('/dashboard/queue/edit/{id}','edit')->name('queue.edit');
    Route::post('/dashboard/queue/update/{id}','update')->name('queue.update');
    Route::get('/dashboard/queue/delete/{id}','delete')->name('queue.delete');
    Route::get('/dashboard/queue/update/{id}/{status}/{barber_id?}','status')->name('queue.status');
});

Route::controller(JobtableController::class)->group(function () {
    Route::post('/check','getTimePost')->name('timePost');
    Route::post('/create','create')->name('queueCreate');
    Route::get('/fullcalender', 'index')->name('calendar');
    Route::post('/fullcalenderAjax', 'ajax')->name('calendarAjax');
});
