<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlavorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::put('/updateStock/{id}', [FlavorController::class, 'updateStock'])->middleware('auth')->name('updateStock');
Route::put('/refreshStock/{id}', [FlavorController::class, 'refreshStock'])->middleware('auth')->name('refresh');