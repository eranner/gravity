<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlavorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ToppingController;
use App\Http\Controllers\ShakeController;
use App\Http\Controllers\SpecialsController;
use App\Http\Controllers\SoftServeController;
use App\Http\Controllers\OrderBuilder;
use App\Http\Controllers\OrderConfirmationController;
use App\Http\Controllers\OrderFillerController;
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

Route::get('/dashboard', [HomeController::class, 'homeLoader'])->middleware('auth')->name('dashboard');
Route::get('/', [HomeController::class, 'homePage'])->name('main');
Route::post('/login', [LoginController::class, 'loginUser'])->name('loginAction');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/add/flavor',[FlavorController::class, 'store'])->middleware('auth');


Route::post('/add/topping', [ToppingController::class, 'store'])->middleware('auth');
Route::put('/updateStock/topping/{id}', [ToppingController::class, 'updateStock'])->middleware('auth')->name('updateTopping');
Route::put('/refreshStock/topping/{id}', [ToppingController::class, 'refreshStock'])->middleware('auth')->name('refreshTopping');


Route::post('/add/shake', [ShakeController::class, 'store'])->middleware('auth');
Route::put('/updateStock/shake/{id}', [ShakeController::class, 'updateStock'])->middleware('auth')->name('updateShake');
Route::put('/refreshStock/shake/{id}', [ShakeController::class, 'refreshStock'])->middleware('auth')->name('refreshShake');


Route::post('/add/special', [SpecialsController::class, 'store'])->middleware('auth');
Route::put('/updateStock/special/{id}', [SpecialsController::class, 'updateStock'])->middleware('auth')->name('updateSpecial');
Route::put('/refreshStock/special/{id}', [SpecialsController::class, 'refreshStock'])->middleware('auth')->name('refreshSpecial');


Route::post('/add/softServe', [SoftServeController::class, 'store'])->middleware('auth');
Route::put('/updateStock/softServe/{id}', [SoftServeController::class, 'updateStock'])->middleware('auth')->name('updateSoftServe');
Route::put('/refreshStock/softServe/{id}', [SoftServeController::class, 'refreshStock'])->middleware('auth')->name('refreshSoftServe');


Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::put('/updateStock/{id}', [FlavorController::class, 'updateStock'])->middleware('auth')->name('updateStock');
Route::put('/refreshStock/{id}', [FlavorController::class, 'refreshStock'])->middleware('auth')->name('refresh');

Route::get('/mobileorders', [OrderBuilder::class, 'loadBuilder'])->name('mobileorders');

Route::post('/orderConfirmation', [OrderConfirmationController::class, 'loadConfirmation'])->name('orderConfirmation');

Route::post('/placeOrder', [OrderConfirmationController::class, 'addOrder'])->name('placeOrder');
Route::post('/stripePayment', [OrderConfirmationController::class, 'runStripe'])->name('stripePayment');
Route::get('successfulPayment', [OrderConfirmationController::class, 'successfulPayment'])->name('successfulPayment');


Route::get('/orderDashboard', [OrderFillerController::class, 'index'])->name('orderFiller')->middleware('auth');
