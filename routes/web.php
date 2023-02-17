<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
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

Route::controller(IndexController::class)->group(function (){
    Route::get('/', 'index')->name('home');

});

Route::controller(AuthController::class)->group(function (){
    Route::get('/reg', 'reg')->name('reg');
    Route::get('/auth', 'auth')->name('auth');
    Route::post('/register', 'register')->name('register');
    Route::post('/signin', 'signin')->name('signin');
    Route::get('/exit', 'exit')->name('exit');
});
