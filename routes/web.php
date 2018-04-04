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

Route::get('/', function () {
    return view('welcome');
});
Route::get('avatars', 'HomeController@index')->name('avatars');
Route::get('addAvatar', 'HomeController@addAvatar')->name('addAvatar');
Route::post('addAvatar', 'HomeController@saveAvatar')->name('postAvatar');
Route::get('deleteAvatar/{avatar}', 'HomeController@deleteAvatar')->name('deleteAvatar');
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();


