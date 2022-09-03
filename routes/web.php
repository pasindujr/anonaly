<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FeedbackController;
use App\Http\Livewire\Home;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;

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

Route::get('/', Home::class);


Route::post('/save', [AuthController::class, 'save'])->name('auth.save');
Route::post('/check', [AuthController::class, 'check'])->name('auth.check');

//Route group to prevent access of unauthorized users.
Route::group(['middleware' => ['AuthCheck']], function () {
    // Auth routes
    Route::get('/login', Login::class)->name('auth.login');
    Route::get('/register', Register::class)->name('auth.register');

    //User routes
    Route::prefix('account')->group(function () {
        Route::get('/', [UserController::class, 'account']);
        Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

        //delete feedback in account
        Route::get('/feedback/delete/{feedbackId}', [FeedbackController::class, 'deleteFeedback'])->name('feedback.delete');
    });

});

//Route for anonymous feedback page which can be accessed through username.
Route::get('/{username}', [FeedbackController::class, 'giveFeedback']);
Route::post('/{username}/tell', [FeedbackController::class, 'saveFeedback']);
