<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//
Route::namespace('Api')->prefix('v1')->group(function () {
//    Route::middleware('api.refresh')->group(function () {
        Route::post('/aa', 'PeopleController@aa');//->name('users.index');
        Route::post('/bb', 'PeopleController@bb');//->name('users.index');
        Route::get('/cc', 'PeopleController@cc');//->name('users.index');
//    });
});

Route::get('login','PeopleController@aa');
//Route::prefix('auth')->group(function($router) {
//    $router->post('login', 'AuthController@login');
//    $router->post('logout', 'AuthController@logout');
//
//});
//
//Route::middleware('refresh.token')->group(function($router) {
//    $router->get('profile','UserController@profile');
//});