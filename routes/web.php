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
Route::get('list', 'AvatarController@showAvatarList');
Route::get('pic/{id}', 'AvatarController@showAvatar');
Route::get('add', 'AvatarController@addAvatar');
Route::post('add', 'AvatarController@saveAvatar');
