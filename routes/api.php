<?php


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
Route::post('/login','AuthController@login')->name('auth.login');
Route::post('/user/add','UserController@add')->name('user.add');

Route::middleware(['cors','auth:api'])->group(function () {
    Route::post('/logout','AuthController@logout')->name('auth.logout');
    Route::post('/user/info','UserController@info')->name('user.info');

});
