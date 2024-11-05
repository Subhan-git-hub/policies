<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;



Route::resource('books',BookController::class)->middleware(['auth']);

Route::get('/',[UserController::class,'loginPage'])->name('home');//showing login page as home page from the controller method loginPage

Route::get('/logout',[UserController::class,'logout'])->name('logout');

Route::post('/login',[UserController::class,'login'])->name('login');



//data in the users table entenred from the register file which we deleted after adding the data in the table//

