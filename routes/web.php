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
    dd($simpleFilters = [
        'id', // where('id', 'query')
        'slug' => ['like', '?%'], // where('slug', 'like', 'query%')
        'name' => ['like', '?%'],
        'http_path' => ['like', '%?%'], // where('http_path', 'like', '%query%')
    ]);
    return view('web.index.index');
});

Route::get('/index',"IndexController@index");
Route::get('/demo',"IndexController@demo");