<?php

use Illuminate\Support\Facades\Route;
// use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        Route::group(['namespace' => 'Dashboard','prefix'=> 'admin', 'middleware' => 'guest:admin'], function(){
            Route::get('login', 'LoginController@login')->name('admin.login');
            Route::post('login', 'LoginController@postLogin')->name('admin.post.login');
        
        });
        
        Route::group(['namespace' => 'Dashboard','prefix'=> 'admin', 'middleware' => 'auth:admin'], function(){
            Route::get('/', 'DashboardController@index')->name('admin.dashboard');
            // shpping method route
            
            Route::get('logout', 'LoginController@logout')->name('admin.logout');

            Route::group(['prefix'=> 'settings'],function(){
                Route::get('shpping-method/{type}','SettingsController@edit_shpping')->name('edit.shpping.method');
                Route::PUT('shpping-method/{id}','SettingsController@update_shpping')->name('update.shpping.method');
            });
        });
        
    });




