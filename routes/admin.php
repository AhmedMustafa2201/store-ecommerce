<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ADMIN Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// note prefix => admin


Route::group(['namespace' => 'Dashboard', 'middleware' => 'guest:admin'], function(){
    Route::get('login', 'LoginController@login')->name('admin.login');
    Route::post('login', 'LoginController@postLogin')->name('admin.post.login');

});

Route::group(['namespace' => 'Dashboard', 'middleware' => 'auth:admin'], function(){
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');

});
