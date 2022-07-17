<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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


Route::post('/save', [AuthController::class, 'save'])->name('auth.save');
Route::post('/check', [AuthController::class, 'check'])->name('auth.check');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

//Route group to prevent access of unauthorized users.
Route::group(['middleware' => ['AuthCheck']], function () {
    // Auth routes
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');

    //User routes
    Route::get('/account', [UserController::class, 'account']);
});

