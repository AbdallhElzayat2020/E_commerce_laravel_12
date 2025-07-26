<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {


    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('test', function () {
        return view('dashboard.home');
    })->name('test');
});
