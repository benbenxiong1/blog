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
//跨域
Route::middleware(['cors'])->group(function () {
    Route::post('/login', 'AuthController@login')->name('auth.login');
    //文件上传
    Route::post('/public/img', 'PublicController@img')->name('public.img');

    //文章
    Route::group(['prefix'=>"/article"],function (){
        Route::post('/list', 'ArticleController@list')->name('article.list');
        Route::post('/edit', 'ArticleController@edit')->name('article.edit');
        Route::post('/label', 'ArticleController@label')->name('article.label');
    });


    //后台接口需要登录验证
    Route::middleware(['cors', 'auth:api'])->group(function () {
        Route::post('/logout', 'AuthController@logout')->name('auth.logout');
        Route::post('/user/info', 'UserController@info')->name('user.info');

        Route::post('/article/add', 'ArticleController@add')->name('article.add');
    });
});
