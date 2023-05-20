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

Auth::routes([
    // 'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', function () {
    return view('admin');
})->middleware('admin')->name('admin');

Route::get('/student', function () {
    return view('student');
})->middleware('student')->name('student');

//attestaion routes
Route::get('/attestations', [App\Http\Controllers\AttestationController::class, 'getAttestationByStudent']
)->name('attestation.list')->middleware('student');

Route::post('/create-attestation', [App\Http\Controllers\AttestationController::class, 'createAttestation'])
    ->name('attestation.create')->middleware('student');

//download attestation
Route::post('/attestation/{id}', [App\Http\Controllers\AttestationController::class, 'downloadAttestation'])
    ->name('attestation.download')->middleware('student');