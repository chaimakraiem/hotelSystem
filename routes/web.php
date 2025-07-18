<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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
Route::get('/', [AdminController::class, 'home']);

Route::get('/home', [AdminController::class, 'index'])->middleware('auth')->name('home');

Route::get('/addRoom', [AdminController::class, 'addRoom']);

Route::post('/storeRoom', [AdminController::class, 'storeRoom']);

Route::get('/dispalyRoom', [AdminController::class, 'dispalyRoom']);

Route::get('/deleteRoom/{id}', [AdminController::class, 'deleteRoom']);

Route::get('/updateRoom/{id}', [AdminController::class, 'updateRoom']);

Route::post('/upRoom/{id}', [AdminController::class, 'upRoom']);

Route::get('/detailsRomm/{id}', [HomeController::class, 'detailsRomm']);
