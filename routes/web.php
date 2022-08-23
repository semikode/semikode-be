<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ServiceController;




Route::view('404', 'errors.404')->name('404');



Route::get('/', function () {
    return view('welcome');
});

Route::get('category', [CategoryController::class,'index'])->name('category');
Route::get('client', [ClientController::class,'index'])->name('client');
Route::get('contact', [ContactController::class,'index'])->name('contact');
Route::get('service', [ServiceController::class,'index'])->name('service');
Route::get('portofolio', [PortofolioController::class,'index'])->name('portofolio');

