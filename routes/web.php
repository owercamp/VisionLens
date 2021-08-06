<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/client', [ClientController::class, 'index'])->name('client.index');
Route::get('/new-client', [ClientController::class, 'create'])->name('client.create');
Route::post('/new-client/new', [ClientController::class, 'store'])->name('client.store');
Route::post('/new-client/update',[ClientController::class, 'update'])->name('client.update');
Route::post('/new-client/delete',[ClientController::class, 'destroy'])->name('client.destroy');
Route::get('/user', [UserController::class, 'index'])->name('user.index');
