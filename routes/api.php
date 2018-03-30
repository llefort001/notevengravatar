<?php

use Illuminate\Http\Request;
use Dingo\Api\Routing\Router;
$api = app(Router::class);


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



$api->version('v1', ['middleware' => 'api.auth'], function (Router $api) {
    $api->get('users', 'App\Http\Controllers\Api\V1\UserController@index');
});
$api->version('v1', ['middleware' => 'api.auth'], function (Router $api) {
    $api->get('avatars', 'App\Http\Controllers\Api\V1\AvatarController@index');
});
$api->version('v1', [], function (Router $api) {
    $api->get('avatar/{hashedEmail}', 'App\Http\Controllers\Api\V1\AvatarController@showAvatar')->name('avatar');
});
$api->version('v1', [], function (Router $api) {
    $api->get('info/', 'App\Http\Controllers\Api\V1\InfoController@index');
});