<?php

use Illuminate\Support\Facades\Route;

Route::post('login', 'Api\AuthController@login');

Route::namespace('Api')->middleware('auth:api')->group(function(){

	Route::prefix('file')->controller('FileController')->group(function(){
		Route::post('', 'store');
	});

	Route::prefix('user')->controller('UserController')->group(function(){
		Route::get('', 'index');
		Route::post('', 'store');
		Route::get('{id}', 'show');
		Route::put('{id}', 'update');
		Route::delete('{id}', 'destroy');
		Route::post('datatables', 'datatables');
	});
	
	Route::prefix('category')->controller('CategoryController')->group(function(){
		Route::get('', 'index');
		Route::post('', 'store');
		Route::get('{id}', 'show');
		Route::put('{id}', 'update');
		Route::delete('{id}', 'destroy');
		Route::post('datatables', 'datatables');
	});

	Route::prefix('client')->controller('ClientController')->group(function(){
		Route::get('', 'index');
		Route::post('', 'store');
		Route::get('{id}', 'show');
		Route::put('{id}', 'update');
		Route::delete('{id}', 'destroy');
		Route::post('datatables', 'datatables');
	});
	
	Route::prefix('contact')->controller('ContactController')->group(function(){
		Route::get('', 'index');
		Route::post('', 'store');
		Route::get('{id}', 'show');
		Route::put('{id}', 'update');
		Route::delete('{id}', 'destroy');
		Route::post('datatables', 'datatables');
	});
	
	Route::prefix('service')->controller('ServiceController')->group(function(){
		Route::get('', 'index');
		Route::post('', 'store');
		Route::get('{id}', 'show');
		Route::put('{id}', 'update');
		Route::delete('{id}', 'destroy');
		Route::post('datatables', 'datatables');
	});
	
	Route::prefix('portfolio')->controller('PortfolioController')->group(function(){
		Route::get('', 'index');
		Route::post('', 'store');
		Route::get('{id}', 'show');
		Route::put('{id}', 'update');
		Route::delete('{id}', 'destroy');
		Route::post('datatables', 'datatables');
	});
	
});
