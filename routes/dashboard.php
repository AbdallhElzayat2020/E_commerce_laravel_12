<?php

use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\Auth\ForgetPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\Auth\ResetPasswordController;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard',
        'as' => 'dashboard.',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

    #################################### Auth Routes ####################################
    Route::controller(AuthController::class)->group(function () {

        Route::get('login', 'showLoginForm')->name('login');
        Route::post('login', 'handleLogin')->name('handle-login');

    });


    /*   Reset Password With OTP  */
    Route::prefix('password')->name('password.')->middleware('guest:admin')->group(function () {

        #################################### Forget Password Routes ####################################
        Route::controller(ForgetPasswordController::class)->group(function () {

            Route::get('forget-password', 'showForgetPasswordForm')->name('forget-password.email');
            Route::post('forget-password', 'sendEmailResetLink')->name('forget-password.submit');

            Route::get('show-otp-form/{email}', 'showOtpForm')->name('show-otp-form');
            Route::post('verify-otp-form', 'verifyOtpForm')->name('verify-otp');

        });

        #################################### Reset Password Routes ####################################
        Route::controller(ResetPasswordController::class)->group(function () {
            Route::get('/reset-password/{email}', 'showResetPasswordForm')->name('show-reset-password-form');
            Route::post('reset-password', 'resetPassword')->name('reset-password.submit');
        });

    });

    #################################### Protected Routes ####################################

    Route::group(['middleware' => ['auth:admin']], function () {

        #################################### Welcome Home Routes ####################################
        Route::get('welcome', [HomeController::class, 'welcome'])->name('welcome');
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    });

});

Route::get('login', function () {
    return 'login_page';
})->name('login');
