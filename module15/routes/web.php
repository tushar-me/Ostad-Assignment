<?php

use Illuminate\Support\Facades\Route;



Route::get('/',function(){
    return view('welcome');
})->name('home_page');


Route::get('/home', function () {
    return view('/dashboard');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', function () {
        // Profile route logic
    });

    Route::get('/settings', function () {
        // Settings route logic
    });
});

