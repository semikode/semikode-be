<?php

use Illuminate\Support\Facades\Route;

Route::view('404', 'errors.404')->name('404');



Route::get('/', function () {
    return view('welcome');
});
