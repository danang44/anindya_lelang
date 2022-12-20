<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/manlelang', 'Admin\AdminController@manlelang')->name('manlelang');
Route::post('/manlelang_store', 'Admin\AdminController@store');

// google route
Route::get('/auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('/auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('/user_lelang', 'Admin\AdminController@user_lelang')->name('user_lelang');
Route::post('/userlelang_store', 'Admin\AdminController@userlelang_store');
