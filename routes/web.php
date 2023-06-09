<?php

use App\Http\Controllers\Auth\AuthController;
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
    return view('welcome');
});


Route::get('/auth', [AuthController::class, 'index'])->name('auth.index');
Route::post('/auth-login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth-register', [AuthController::class, 'register'])->name('auth.register');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
