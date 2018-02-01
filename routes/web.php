<?php

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

Route::get('/', 'authController@create');
Route::post('/login', 'authController@store');
Route::get('/logout', 'authController@destroy');
Route::get('/register', 'accountController@create');

Route::get('/dashboard', 'dashboardController@create');
Route::get('/email-blast', 'emailController@create');
Route::post('/email-blast', 'emailController@store');