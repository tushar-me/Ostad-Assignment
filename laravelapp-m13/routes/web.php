<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;


Route::get('/',function(){
    return view('public');
})->name('home_page');

Route::get('/admin',[PageController::class, 'adminPage'])->name('admin_page');