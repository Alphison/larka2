<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\IndexController;
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

Route::controller(UserController::class)->group(function (){
    Route::get('/add', 'add')->name('add');
    Route::get('/book/{book:id}/update', 'update')->name('update');
});

Route::controller(BookController::class)->group(function (){
    Route::post('/add', 'add')->name('add');
    Route::get('/book/{id}', 'show')->name('show');
    Route::get('/delete/{id}', 'delete')->name('delete');
    Route::post('/{book:id}/update', 'updatePost')->name('updatePost');
});
