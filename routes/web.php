<?php

use App\Http\Controllers\CovidController;
use App\Http\Controllers\UserController;
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

Route::controller(UserController::class)->group(function(){
    Route::get('/', 'index')->middleware('auth');
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::get('/register', 'register')->middleware('guest');
    Route::post('/logout', 'logout');
    Route::get('/traffic', 'traffic')->middleware('auth');
    Route::put('/changeRoute', 'way')->middleware('auth');
    Route::get('/user', 'user')->middleware('auth');

    Route::get('/user/add', 'create');
    Route::post('/user/add', 'add');

    Route::post('/store', 'store');
    Route::post('/login/process', 'process');
    Route::get('/user/search', 'search');

    Route::get('/user/{user}', 'show');
    Route::put('/user/{user}', 'update');
    Route::delete('/user/{user}', 'destroy');


});

Route::controller(CovidController::class)->group(function(){
    Route::get('/covid/add', 'create')->middleware('auth');
    Route::post('/covid/add', 'store');
    Route::get('/covid/{covid}', 'show')->middleware('auth'); 
    Route::put('/covid/{covid}', 'update'); 
    Route::delete('/covid/{covid}', 'destroy');

});
