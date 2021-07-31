<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    if(Auth::check()){
        return view('home');
    }
    else {
        return view('auth/login');
    }
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/client', [\App\Http\Controllers\ClientController::class, 'index'])->name('client.index');
Route::get('/new-client', [\App\Http\Controllers\ClientController::class, 'create'])->name('client.new');
Route::post('/new-client/new', [\App\Http\Controllers\ClientController::class, 'store'])->name('client.store');
Route::get('/user', [\App\Http\Controllers\UserController::class, 'index'])->name('user');
